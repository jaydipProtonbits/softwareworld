<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Country};
use App\Models\Category;
use App\Models\Claim;
use App\Models\Industries;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SoftwareImport;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.listing.list');
    }

    public function ListingData(Request $request)
    {
        $is_admin = in_array('admin', auth()->user()->roles()->pluck('name')->toArray()) ? true : false;

        $columns = [
          1 => 'id',
          2 => 'name',
          3 => 'vendor_name',
          4 => 'status',
          5 => 'created_at',
          6 => 'updated_at',
        ];

        $search = [];
        $totalData = Listing::query()
          ->when(!$is_admin, function ($q) {
            $q->where('created_by', Auth::id());
            $q->orWhere('claimed_by', Auth::id());
          })
          ->where('status', '!=', 2)
          ->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
          $users = Listing::query()
            ->when(!$is_admin, function ($q) {
              $q->where('created_by', Auth::id());
              $q->orWhere('claimed_by', Auth::id());
            })
            ->where('status', '!=', 2)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
        } else {
          $search = $request->input('search.value');

          $start_date = $end_date = null;
          $dates = str_contains($search, '|') ? explode('|', $search) : [];
          if ($dates)
          {
            $start_date = $dates[0];
            $end_date = $dates[1];
          }

          $query = Listing::query()
            ->where(function ($query) use ($search) {
              $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('vendor_name', 'LIKE', "%{$search}%");
            })
            ->where(function ($query) use ($start_date, $end_date) {
              if ($start_date && $end_date) {
                $query->orWhereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59']);
              }
            })
            ->where('status', '!=', 2);

          if (!$is_admin) {
            $query->where(function ($query) {
              $query->where('created_by', Auth::id())
                ->orWhere('claimed_by', Auth::id());
            });
          }

          $users = $query->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


          $_query = Listing::query()
            ->where(function ($query) use ($search) {
              $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('vendor_name', 'LIKE', "%{$search}%");
            })
            ->when(($start_date && $end_date), function ($query) use ($start_date, $end_date) {
              $query->orWhereBetween('created_at', [$start_date.' 00:00:00', $end_date.' 23:59:59']);
            })
            ->where('status', '!=', 2);

          if (!$is_admin) {
            $_query->where(function ($query) {
              $query->where('created_by', Auth::id())
                ->orWhere('claimed_by', Auth::id());
            });
          }

          $totalFiltered = $_query->count();
        }

        $data = [];

        if (!empty($users)) {
          // providing a dummy id instead of database ids
          $ids = $start;

          foreach ($users as $user) {
            $nestedData['id'] = $user->id;
            $nestedData['fake_id'] = ++$ids;
            $nestedData['type'] = 'Software';
            $nestedData['name'] = $user->name;
            $nestedData['vendor_name'] = $user->vendor_name??'-';
            $nestedData['status'] = ($user->status == 1 ? 'Active' : ($user->status == 2 ? 'Future' : 'Pending')).'<br /><b>('.($user->claimed_by ? 'Claimed' : 'Unclaimed').'</b>)';
            $nestedData['created_at'] = date("d-m-Y h:i", strtotime($user->created_at));
            $nestedData['updated_at'] = date("d-m-Y h:i", strtotime($user->updated_at));

            $data[] = $nestedData;
          }
        }

        return response()->json([
          'draw' => intval($request->input('draw')),
          'recordsTotal' => intval($totalData),
          'recordsFiltered' => intval($totalFiltered),
          'code' => 200,
          'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $current_route = Route::current()->getName();
        $countries = Country::get(["name", "id"]);
        $category = Category::where('type_id',2)->get(['name','id']);
        $industries = Industries::get(['name','id']);
        return view('admin.listing.create',[
          'countries' => $countries,
          'category' => $category,
          'industries' => $industries,
          'current_route' => $current_route
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'tagline' => 'required',
      'website' => 'required|url',
      'vendor_name' => 'required',
      'country' => 'required',
      'contact_no' => 'required',
      'category' => 'required',
      'languages_supported' => 'required',
      'target_industry' => 'required',
      'vendor_company_size' => 'required',
      'licensing_model' => 'required',
      'software_development_type' => 'required',
      'device_supported' => 'required',
      'device_supported_url' => 'required',
      'target_company_size' => 'required',
      //'social_profile' => 'required|url',
    ]);

    $allIncludeCountry = $request->has('all_include_country') ? $request->input('all_include_country') : 0;
    if ($allIncludeCountry) {
      $request->request->remove('include_countries');
    } else {
      $request->validate([
        'include_countries' => 'required',
      ]);
    }

    if ($request->hasFile('logo')) {
      $file = $request->file('logo');
      $imageName = time().'.'.$file->getClientOriginalExtension();
      $file->move(public_path('assets/company'), $imageName);
    }

    $Listing = Listing::query()
      ->create([
        'created_by' => Auth::user()->is_admin() ? 0 : Auth::id(),
        'status' => Auth::user()->is_admin() ? 1 : 0,
        'name' => $request->name,
        'logo' => $imageName ?? '',
        'tagline' => $request->tagline,
        'website' => $request->website,
        'vendor_name' => $request->vendor_name,
        'categories' => !empty($request->category) ? $request->category : '',
      ]);


    $Listing->setManyMeta([
      'is_information' => 1,
      'country' => $request->country,
      'state' => $request->state,
      'city' => $request->city,
      'street' => $request->street,
      'zip_code' => $request->zip_code,
      'contact_no' => $request->contact_no,
      'category' => $request->category,
      'include_countries' => $request->include_countries,
      'all_include_country' => $request->has('all_include_country') ? $request->all()['all_include_country'] : 0,
      'languages_supported' => $request->languages_supported,
      'target_industry' => $request->target_industry,
      'target_company_size' => $request->vendor_company_size,
      'licensing_model' => $request->licensing_model,
      'software_development_type' => $request->software_development_type,
      'device_supported' => $request->device_supported,
      'device_supported_url' => $request->device_supported_url,
      'company_size' => $request->target_company_size,
      //'company_size_url' => $request->target_company_size_url,
      'social_profile' => $request->social_profile,
      'year_founded' => $request->year_founded,
    ]);

    if (Auth::user()->is_admin()) {
      return redirect(route('details', ['description', $Listing->id]));
    }

    return redirect(route('manage_details', ['description', $Listing->id]));
  }

    public function getDetails($type, Listing $listing)
    {
        $category = Category::where('type_id',2)->get(['name','id']);
        $countries = Country::get(["name", "id"]);
        $industries = Industries::get(['name','id']);

        return view('admin.listing.'.$type,[
            'type'      => $type,
            'countries' => $countries,
            'category'  => $category,
            'industries'=> $industries,
            'listing'   => $listing,
        ]);
    }

    public function saveDescription($type , Listing $listing, Request $request)
    {
        $request->validate([
          'short_description' => 'required', // Maximum of 140 words
          'long_description' => 'required', // Maximum of 1000 words
        ]);

      $shortWordCount = str_word_count($request->all()['short_description']);
      if ($shortWordCount > 140)
      {
        return redirect()->back()->withErrors(['short_description' => 'Maximum of 140 words allowed.']);
      }

      $longWordCount = str_word_count($request->all()['long_description']);
      if ($longWordCount > 1000)
      {
        return redirect()->back()->withErrors(['long_description' => 'Maximum of 1000 words allowed.']);
      }

      $listing->setManyMeta([
            'is_description' => 1,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_description' => $request->category_description,
        ]);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['features', $listing->id]));
        }

        return redirect(route('manage_details', ['features', $listing->id]));
    }

    public function saveFeatures($type , Listing $listing, Request $request)
    {
        $validator = $request->validate([
            'features'      => 'required',
        ]);
        $listing->setManyMeta([
            'features' => $request->features,
            'is_features' => 1,
            'features_cat_page_url' => array_filter($request->cat_page_url),
        ]);


      if (Auth::user()->is_admin()) {
        return redirect(route('details',['media',$listing->id]));
      }

      return redirect(route('manage_details',['media',$listing->id]));
    }

    public function uploadMedia(Request $request) {
        if (!empty($request->file)) {
            $path = public_path().'/media/listing-'.$request->id;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $image_64 = $request->file; //your base64 encoded data
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',')+1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.$extension;
            \Storage::disk('local_public')->put('/media/listing-'.$request->id.'/'.$imageName, base64_decode($image));


            $listing = Listing::find($request->id);
            if (empty($request->CatId)) {
                $media = $listing->getMeta('d_media') ?? [];
                $numb = count($media);
                if (empty($media)) {
                    $media[1]= array('media' => url('/media/listing-'.$request->id.'/'.$imageName), 'text'=> '');
                }else {
                    $media[(count($media)+1)] = array('media' => url('/media/listing-'.$request->id.'/'.$imageName), 'text'=> '');
                }
                $listing->setMeta('d_media', $media);

                $html = "<tr>";
                    $html .= '<td style="width: 23px;text-align: center;padding:0">';
                        $html .= '<span class="remove-screenshot" id="'.$numb.'" data-cat_id="">-</span>';
                    $html .= "</td>";

                    $html .= '<td style="width:200px;text-align: center;padding:0 20px 0 18px">';
                        $html .= '<div class="screenshot-div-box text-center"><img src="'.url('/media/listing-'.$request->id.'/'.$imageName).'"></div>';
                    $html .= "</td>";

                    $html .= "<td>";
                        $html .= '<div class="screenshot-desc">
                                    <div class="input textarea">
                                    <label for="">Description</label>
                                    <textarea name="base_media['.$numb.'][text]" data-id="'.$numb.'" rows="5" placeholder="Enter description" class="form-control screenshot_desc" maxlength="150" cols="30"></textarea></div>
                                </div>';
                    $html .= "</td>";
                $html .= "</tr>";
            }else {
                $media = $listing->getMeta('c_media');
                $catId = $request->CatId;
                $numb = 0;
                if (!empty($media)) {
                    if (!empty($media[$catId])) {
                        $numb = count($media[$catId]);
                    }
                }



                if (empty($media)) {
                    $media[$catId][1]= array('media' => url('/media/listing-'.$request->id.'/'.$imageName), 'text'=> '');
                }else {
                    $media[$catId][($numb+1)] = array('media' => url('/media/listing-'.$request->id.'/'.$imageName), 'text'=> '');
                }
                $listing->setMeta('c_media', $media);
                $html = "<tr>";
                    $html .= '<td style="width: 23px;text-align: center;padding:0">';
                        $html .= '<span class="remove-screenshot" id="'.($numb+1).'" data-cat_id="'.$catId.'">-</span>';
                    $html .= "</td>";

                    $html .= '<td style="width:200px;text-align: center;padding:0 20px 0 18px">';
                        $html .= '<div class="screenshot-div-box text-center"><img src="'.url('/media/listing-'.$request->id.'/'.$imageName).'"></div>';
                    $html .= "</td>";

                    $html .= "<td>";
                        $html .= '<div class="screenshot-desc">
                                    <div class="input textarea">
                                    <label for="">Description</label>
                                    <textarea name="media['.$catId.']['.($numb+1).'][text]" data-id="'.($numb+1).'" rows="5" placeholder="Enter description" class="form-control screenshot_desc" maxlength="150" cols="30"></textarea></div>
                                </div>';
                    $html .= "</td>";
                $html .= "</tr>";

            }
            echo $html;
            exit();
        }

    }

    public function removeMedia(Request $request)
    {
        $listing = Listing::find($request->listingID);
        if (!empty($request->cat_id)) {
            $c_media = $listing->getMeta('c_media');
            $image = basename($c_media[$request->cat_id][$request->id]['media']);
            unlink(public_path().'/media/listing-'.$request->listingID.'/'.$image);
            unset($c_media[$request->cat_id][$request->id]);
            $listing->setMeta('c_media', $c_media);
        }else {
            $d_media = $listing->getMeta('d_media');
            $image = basename($d_media[$request->id]['media']);
            unlink(public_path().'/media/listing-'.$request->listingID.'/'.$image);
            unset($d_media[$request->id]);
            $listing->setMeta('d_media', $d_media);
        }
        return 1;
    }

    public function saveMedia($type , Listing $listing, Request $request)
    {
        $request->validate([
          "media_screenshots.*"  => "dimensions:max_width=500,max_height=250",
        ],[
          "media_screenshots.*" => "The Media images dimensions must be at most 500x250 pixels."
        ]);

        if ($request->has('media_video'))
        {
          $listing->setMeta('media_video', $request->all()['media_video']);
        }

        $allSS = [];
        if ($request->hasFile('media_screenshots')) {
          foreach ($request->file('media_screenshots') as $imagefile) {
            $imageName = time().rand(1111, 9999).'.'.$imagefile->getClientOriginalExtension();
            $imagefile->move(public_path('assets/software/media'), $imageName);
            $allSS[] = $imageName;
          }
        }

        if (!empty($listing->getMeta('screenshots'))) {
          $screenshots = $listing->getMeta('screenshots');
          foreach ($screenshots as $ss) {
            if (!in_array($ss, $request->preloaded)) {
              @unlink(public_path('assets/software/media/'.$ss));
              $key = array_search($ss, $screenshots);
              if ($key !== false) {
                unset($screenshots[$key]);
              }
            }
          }
        }

        if (!empty($allSS)) {
          if (!empty($listing->getMeta('screenshots'))) {
            $screenshotsSave = array_merge($screenshots, $allSS);
          }else {
            $screenshotsSave = $allSS;
          }
        }else {
          if (!empty($listing->getMeta('screenshots'))) {
            $screenshotsSave = $screenshots;
          }else {
            $screenshotsSave = '';
          }
        }

        if ($screenshotsSave)
        {
          $listing->setMeta('screenshots', $screenshotsSave);
        }

        if ($request->has('screenshots_description')) {
          $listing->setMeta('screenshots_description', json_encode(array_filter($request->all()['screenshots_description'])));
        }

        if ($request->has('c_media') && !empty($request->c_media) || $request->has('media')) {
            $c_media = $listing->getMeta('c_media');
            $r_media = $request->c_media;
            $new_media = $request->has('media') ? $request->all()['media'] : [];

            foreach ($c_media ?? [] as $key => $value) {
              if (!empty($r_media[$key])) {
                foreach ($value as $k => $val) {
                  if ( !empty($r_media[$key][$k]) ) {
                    $c_media[$key][$k]['text'] = $r_media[$key][$k]['text'];
                  }
                }
              } elseif (!empty($new_media[$key])) {
                foreach ($value as $k => $val) {
                  if ( !empty($new_media[$key][$k]) ) {
                    $c_media[$key][$k]['text'] = $new_media[$key][$k]['text'];
                  }
                }
              }
            }
            $listing->setMeta('c_media', $c_media);
        }
        $listing->setMeta('is_media',1);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['destination', $listing->id]));
        }

      return redirect(route('manage_details', ['destination', $listing->id]));
    }

    public function saveMedia_old($type , Listing $listing, Request $request)
    {

        if ($request->has('media_video'))
        {
          $listing->setMeta('media_video', $request->all()['media_video']);
        }

        if ($request->has('base_media') && !empty($request->base_media)) {
            $d_media = $listing->getMeta('d_media');
            $r_media = $request->base_media;
            foreach ($d_media ?? [] as $key => $value) {
              $key = $key - 1;
              if ( !empty($r_media[$key]) )
                {
                  $d_media[($key+1)]['text'] = $r_media[$key]['text'];
                }
            }
            $listing->setMeta('d_media', $d_media);
        }

        if ($request->has('media') && !empty($request->media)) {
            $c_media = $listing->getMeta('c_media');
            $r_media = $request->media;

            foreach ($c_media ?? [] as $key => $value) {
              if (!empty($r_media[$key])) {
                foreach ($value as $k => $val) {
                  if ( !empty($r_media[$key][$k]) ) {
                    $c_media[$key][$k]['text'] = $r_media[$key][$k]['text'];
                  }
                }
              }
            }
            $listing->setMeta('c_media', $c_media);
        }
        $listing->setMeta('is_media',1);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['destination', $listing->id]));
        }

      return redirect(route('manage_details', ['destination', $listing->id]));
    }

    public function saveDestination($type , Listing $listing, Request $request)
    {
        $validator = $request->validate([
            'pricing_url'      => 'required',
        ]);
        $listing->setManyMeta([
            'pricing_url' => $request->pricing_url,
            'trail_url' => $request->trail_url,
            'demo_url' => $request->demo_url,
            'landing_page_url' => $request->landing_page_url,
            'is_destination' => 1,
        ]);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['pricing', $listing->id]));
        }

      return redirect(route('manage_details', ['pricing', $listing->id]));
    }

    public function savePrice($type , Listing $listing, Request $request)
    {
        $validator = $request->validate([
            'pricing_type'      => 'required',
            'pricing_currency'      => 'required',
            'is_free_version'      => 'required',
            'is_free_trail'      => 'required',
        ],
        [
            'pricing_type.required' => 'Pricing Type is required',
            'pricing_currency.required' => 'Preferred Currency is required',
            'is_free_version.required' => 'Please choose free version availability',
            'is_free_trail.required' => 'Please choose free trail availability',
        ]

        );

        $data = $request->except('_token');
        if ($data['is_price_plan'] == 0) {
            unset($data['package']);
        }

        $listing->is_pricing_plan = $request->is_price_plan ?? 0;
        //$listing->trail_period =  $request->trail_duration??$listing->trail_period;
        $listing->trail_period =  $listing->trail_period ?? 0;
        $listing->save();
        if ($request->hasFile('pricing_pdf')) {
            $file = $request->file('pricing_pdf');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/media/listing-'.$listing->id;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $file->move($path, $imageName);
            $data['pricing_pdf'] = $imageName;
        }
        $listing->setManyMeta($data);
        $listing->setMeta('is_price',1);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['integration', $listing->id]));
        }

      return redirect(route('manage_details', ['integration', $listing->id]));
    }

    public function findListing(Request $request)
    {
        $data = $request->all();
        $switchingbypass = $data['switchingbypass'];
        $search = $data['query'];

        $query = Listing::query()
          ->select('id as _id','name','logo', 'name as slug')
          ->where('status',1)
          ->where('name', 'LIKE', "%{$search}%");

        if (!empty($switchingbypass)) {
            $query->whereNotIn('id', [$switchingbypass]);
        }

        if ($request->has('is_claim')) {
          $query->where('claimed_by', 0);
        }

        $listing = $query->get()->toArray();
        return json_encode(array('hits'=>$listing));
    }

    /**
     * Display the specified resource.
     */
    public function futureSoftware(Request $request)
    {
        $Listing = Listing::create([
            'name' => $request->name,
            'status' => 2
        ]);
        $Listing->setManyMeta([
            'created_by' => \Auth::id()
        ]);
        return $Listing->id;
    }

    public function saveIntegration($type , Listing $listing, Request $request) {
        /*$validator = $request->validate([
          'is_open_api' => 'required',
          'api_document_url' => 'required',
        ],[
            'is_open_api.required' => 'Please choose Open API availability',
            'api_document_url.required' => 'Please enter API document URL',
        ]);*/

        $validator = $request->validate([
          'is_open_api' => 'required', // Assuming is_open_api is a boolean field
          'api_document_url' => $request->input('is_open_api') ? 'required' : 'nullable|url',
        ], [
          'is_open_api.required' => 'Please choose Open API availability',
          'api_document_url.required' => 'Please enter API document URL',
          'api_document_url.url' => 'API document URL must be a valid URL',
        ]);

        $listing->setMeta('integrate_software',$request->integrate_software);
        $listing->setMeta('is_open_api',$request->is_open_api);

        if($request->has('api_document_url')) {
          $listing->setMeta('api_document_url',$request->api_document_url);
        }

        $listing->setMeta('is_integration',1);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['training', $listing->id]));
        }

        return redirect(route('manage_details', ['training', $listing->id]));
    }

    public function saveTraining($type , Listing $listing, Request $request) {
        $validator = $request->validate([
            'customer_support'      => 'required',
        ],[
            'customer_support.required' => 'Please choose support type',
        ]);

        $listing->setManyMeta([
            'customer_support' => $request->customer_support,
            'is_free_version' => $request->is_free_version??0,
            'support_email' => $request->support_email??'',
            'provide_training' => $request->provide_training??[],
            /*'knowledge_base' => $request->knowledge_base??[],*/
            'is_training' => 1,
        ]);

        if (Auth::user()->is_admin()) {
          return redirect(route('listing.index'));
        }

        return redirect(route('user_listing'));
    }


    public function saveInformation($type , Listing $listing, Request $request) {
        $validator = $request->validate([
            'name'      => 'required',
            'tagline'      => 'required',
            'website' => 'required',
            'vendor_name' => 'required',
            'country' => 'required',
            'contact_no' => 'required',
            'category' => 'required',
            'languages_supported' => 'required',
            'target_industry' => 'required',
            'vendor_company_size' => 'required',
            'licensing_model' => 'required',
            'software_development_type' => 'required',
            'device_supported' => 'required',
            'device_supported_url' => 'required',
            'target_company_size' => 'required',
            'social_profile' => 'required',
        ]);

      $allIncludeCountry = $request->has('all_include_country') ? $request->input('all_include_country') : 0;
      if ($allIncludeCountry) {
        $request->request->remove('include_countries');
      } else {
        $request->validate([
          'include_countries' => 'required',
        ]);
      }


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/company'), $imageName);
        }

        $Listing = $listing->update([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'website' => $request->website,
            'vendor_name' => $request->vendor_name,
            'categories' => !empty($request->category) ? $request->category : '',
            'logo' => !empty($imageName) ? $imageName : $listing->logo,
        ]);

        $listing->setManyMeta([
            'is_information' => 1,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip_code' => $request->zip_code,
            'contact_no' => $request->contact_no,
            'category' => $request->category,
            'include_countries' => $request->include_countries,
            'all_include_country' => $request->has('all_include_country') ? $request->all()['all_include_country'] : 0,
            'languages_supported' => $request->languages_supported,
            'target_industry' => $request->target_industry,
            'target_company_size' => $request->vendor_company_size,
            'licensing_model' => $request->licensing_model,
            'software_development_type' => $request->software_development_type,
            'device_supported' => $request->device_supported,
            'device_supported_url' => $request->device_supported_url,
            'company_size' => $request->target_company_size,
            //'company_size_url' => $request->target_company_size_url,
            'social_profile' => $request->social_profile,
            'year_founded' => $request->year_founded,
        ]);

        if (Auth::user()->is_admin()) {
          return redirect(route('details', ['description', $listing->id]));
        }

        return redirect(route('manage_details', ['description', $listing->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $countries = Country::get(["name", "id"]);
        $category = Category::where('type_id',2)->get(['name','id']);
        $industries = Industries::get(['name','id']);
        return view('admin.listing.create',['countries'=>$countries, 'category'=>$category, 'industries'=>$industries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        echo 1;
        die();
    }

    public function destroyPackage($package_id)
    {
      $listing = Listing::query()
        ->where('id', \request()->all()['listing_id'])
        ->first();
      if ($listing)
      {
        $data = $listing->getMeta('package');

        if (isset($data[$package_id]))
        {
          unset($data[$package_id]);
        }

        $listing->setMeta('package', $data);
      }

      return true;
    }

    public function statusChange(Request $request) {
        $listing = Listing::find($request->id);
        $listing->status = $request->status;
        $listing->save();
        echo 1;
        exit;
    }

    public function claimByVendor(Request $request)
    {
      $already = Claim::query()
        ->where([
          'user_id' => Auth::user()->id,
          'claimed_id' => $request->enty_id
        ])
        ->count();

      if ($already > 0) {
        return json_encode([
          'success' => 0,
          'message' => 'You have already claimed this listing'
        ]);
      } else {
        Claim::query()->create([
          'type_id' => $request->has('is_service') ? 1 : 2,
          'claimed_id' => $request->enty_id,
          'user_id' => Auth::user()->id,
          'first_name' => Auth::user()->name,
          'last_name' => Auth::user()->name,
          'email' => Auth::user()->email,
          'status' => 'email_verified',
          'email_verified_at' => Carbon::now(),
        ]);

        return json_encode([
          'success' => 1,
          'redirect' => route('user_listing')
        ]);
      }
    }

    public function import() {
        
        $impotred = Excel::import(new SoftwareImport, Storage::path('public/Software-home.xlsx'));
        return json_encode(['success'=>1]);

        // Optionally, you can return a response or redirect

    }

}
