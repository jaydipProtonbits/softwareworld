<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Country};
use App\Models\Category;
use App\Models\Industries;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\ServiceImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin()) {
            if (Auth::user()->services()->count() != 0) {
                abort(401,'Please note that you are allowed to create only one service per account.');
            }
        }
        $countries = Country::get(["name", "id"]);
        $category = Category::where('type_id',1)->get(['name','id']);
        return view('admin.service.create',['countries'=>$countries, 'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = $request->validate([
        'name' => 'required',
        'tagline' => 'required',
        'logo' => 'required',
        'founded' => 'required',
        'employees' => 'required',
        'hourly_rate' => 'required',
        'project_cost' => 'required',
        'website' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'meta.key_clients' => 'required',
      ], [
        'meta.key_clients.required' => 'Company Key Clients is required field',
      ]);
      $meta = $request->meta;
      $data = $request->except(['meta', '_token']);
      if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('assets/service'), $imageName);
        $data['logo'] = $imageName;
      }
      $meta['key_clients'] = array_column(json_decode($meta['key_clients'], true), 'value');

      $service = Services::query()->create($data);
      $service->setManyMeta($meta);
      $service->setMeta('is_info', 1);

      if (Auth::user()->is_admin()) {
        return redirect(route('service_step', ['location', $service->id]));
      }

      return redirect(route('manage_service_step', ['location', $service->id]));
    }

    public function serviceAjax(Request $request) {
      $is_admin = auth()->user()->is_admin();

      $columns = [
        1 => 'id',
        2 => 'name',
        3 => 'created_by',
        4 => 'status',
        5 => 'created_at',
        6 => 'updated_at',
      ];

        $search = [];

        $totalData = Services::query()
          ->when(!$is_admin, function ($q) {
            $q->where('created_by', Auth::id());
            $q->orWhere('claimed_by', Auth::id());
          })->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
          $users = Services::query()
            ->when(!$is_admin, function ($q) {
              $q->where('created_by', Auth::id());
              $q->orWhere('claimed_by', Auth::id());
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
        } else {
          $search = $request->input('search.value');

          $_query = Services::query()
            ->where(function ($query) use ($search) {
              $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('id', $search);
            });

          if (!$is_admin) {
            $_query->where(function ($q) {
              $q->where('created_by', Auth::id())
                ->orWhere('claimed_by', Auth::id());
            });
          }

          $users = $_query->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();


          $query = Services::query()
            ->where(function ($query) use ($search) {
              $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('id', $search);
            });

          if (!$is_admin) {
            $query->where(function ($q) {
              $q->where('created_by', Auth::id())
                ->orWhere('claimed_by', Auth::id());
            });
          }

          $totalFiltered = $query->count();
        }

        $data = [];

        if (!empty($users)) {
          // providing a dummy id instead of database ids
          $ids = $start;

          foreach ($users as $user) {
            $nestedData['id'] = $user->id;
            $nestedData['fake_id'] = ++$ids;
            $nestedData['type'] = 'Service';
            $nestedData['name'] = $user->name;
            $nestedData['vendor_name'] = User::query()
                ->where('id', $user->created_by)
                ->orWhere('id', $user->claimed_by)
                ->first()->name ?? '-';
            $nestedData['status'] = ($user->status == 1 ? 'Active' : ($user->status == 2 ? 'Future' : 'Pending')).'<br /><b>('.($user->claimed_by ? 'Claimed' : 'Unclaimed').'</b>)';
            /*$nestedData['status'] = ($user->status == 1 ? 'Active' : 'Pending');*/
            $nestedData['created_at'] = date("d-m-Y h:i", strtotime($user->created_at));
            $nestedData['updated_at'] = date("d-m-Y h:i", strtotime($user->updated_at));

            $data[] = $nestedData;
          }
        }

        return response()->json([
          'draw' => intval($request->input('draw')),
          'recordsTotal' => intval($totalData ?? 0),
          'recordsFiltered' => intval($totalFiltered ?? 0),
          'code' => 200,
          'data' => $data ?? [],
        ]);
    }

    public function serviceData($step, Services $service) {
      $countries = Country::query()->get(["name", "id"]);
        $category = Category::query()->DefaultOrderBy()->get();
        $main_categories = Category::query()
          ->where('type_id',1)
          ->whereNull('parent_id')
          ->DefaultOrderBy()
          ->get();

        $industries = Industries::orderby('name','asc')->get(['name','id']);
        $Pservice = \DB::table('service_category')->where(['service_id'=>$service->id,'parent_category_id'=>0])->get();
        $Cservice = \DB::table('service_category')->where('service_id',$service->id)->where('parent_category_id','!=', 0)->get();

        return view('admin.service.'.$step,[
            'type'      => $step,
            'countries' => $countries,
            'category'  => $category,
            'main_category' => $main_categories,
            'service'   => $service,
            'Pservice'   => !empty($Pservice) ? $Pservice : [],
            'Cservice'   => !empty($Cservice) ? $Cservice : [],
            'industries'   => $industries,
        ]);
    }

    public function saveLocation(Request $request, Services $service) {
        $validator = $request->validate([
            'country'      => 'required',
            'state'      => 'required',
            'city'      => 'required',
            'street'      => 'required',
            'zip_code'      => 'required',

        ],[
            'zip_code.required' => 'The Zip Code is required field',
        ]);

        $service->country = $request->country;
        $service->state = $request->state;
        $service->city = $request->city;
        $service->street = $request->street;
        $service->postal_code = $request->zip_code;
        $service->location_phone = $request->contact_no;
        $service->save();
        $location = $request->location;
        $location = array_filter($location, fn($value) => !is_null($value['country']) && $value['country'] !== '');
        if (!empty($location)) {
            $service->setMeta('locations', $location);
        }
        $service->setMeta('is_location', 1);

      if (Auth::user()->is_admin())
      {
        return redirect(route('service_step',['service',$service->id]));
      }

      return redirect(route('manage_service_step',['service',$service->id]));
    }

    public function saveClients(Request $request, Services $service) {
        $Industry = $request->data['Industry'];
        $selectedValues = [];
        foreach ($Industry as $valueKey => $value) {
            if ($value['percentage'] > 0) {
                $selectedValues[$valueKey] = $value;
            }
        }
        $service->setMeta('client_industry', $selectedValues);
        $service->setMeta('client_focus', $request->client_focus);
        $service->setMeta('is_clients', 1);

        if ( ($service->getMeta('is_info') == 1) && ($service->getMeta('is_service') == 1) ) {
          $service->update([
            'status' => Auth::user()->is_admin() ? 1 : 0,
          ]);
        }

      if (Auth::user()->is_admin()) {
        return redirect(route('portfolioList', [$service->id]));
      }

      return redirect(route('manage_portfolioList', [$service->id]));
    }

    public function saveService(Request $request, Services $service) {
        $data = $request->data;
        $ServiceLine = $request->ServiceLine;
        $category = [];

        if (!empty($ServiceLine)) {
            \DB::table('service_category')->where('service_id',$service->id)->delete();

            foreach ($ServiceLine as $key => $value) {
                if (intval($value['percentage']) > 0) {
                    $category[] = array('service_id'=>$service->id, 'category_id'=>intval($key), 'parent_category_id'=>0,'percentage'=>intval($value['percentage']));
                    if(!empty($data['MobileFocus'][$key])) {
                        foreach ($data['MobileFocus'][$key] as $k => $val) {
                          if (intval($val['percentage']) > 0) {
                            $category[] = array('service_id'=>$service->id,'parent_category_id'=>intval($key),'category_id'=>intval($val['category_id']),'percentage'=>intval($val['percentage']));
                          }
                        }
                    }
                }
            }
        }

        \DB::table('service_category')->insert($category);
        $service->setMeta('is_service', 1);

      if (Auth::user()->is_admin()) {
        return redirect(route('service_step', ['description', $service->id]));
      }

      return redirect(route('manage_service_step', ['description', $service->id]));

    }

    public function saveDescription(Request $request, Services $service)
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

      $service->setManyMeta([
        'is_description' => 1,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'category_description' => $request->category_description,
      ]);

      if (Auth::user()->is_admin()) {
        return redirect(route('service_step', ['destination', $service->id]));
      }

      return redirect(route('manage_service_step', ['destination', $service->id]));
    }

    public function saveServiceDestination(Request $request, Services $service)
    {
      /*$validator = $request->validate([
        'pricing_url'      => 'required',
      ]);*/
      $service->setManyMeta([
        /*'pricing_url' => $request->pricing_url,
        'trail_url' => $request->trail_url,
        'demo_url' => $request->demo_url,*/
        'landing_page_url' => $request->landing_page_url,
        'is_destination' => 1,
      ]);

      if (Auth::user()->is_admin()) {
        return redirect(route('service_step', ['clients', $service->id]));
      }

      return redirect(route('manage_service_step', ['clients', $service->id]));
    }

    public function savePortfolios(Request $request, Services $service) {
      $request->validate([
        'name' => 'required',
        'timeline' => 'required',
        'project_cost' => 'required',
        'project_industry' => 'required',
        'description' => 'required',
        'thumbnail' => 'required',
        "screenshots.*"  => "dimensions:max_width=500,max_height=250",
      ],[
        "screenshots.*" => "The screenshots images dimensions must be at most 500x250 pixels."
      ]);

        $data = $request->except('_token');
        $allSS = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $imagefile) {
            $imageName = 'screenshot'.'-'.time().rand(0111,9999).'.'.$imagefile->getClientOriginalExtension();
            $imagefile->move(public_path('assets/service'), $imageName);
            $allSS[] = $imageName;
           }
        }

        $data['screenshots'] = !empty($allSS) ? json_encode($allSS) : '';

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/service'), $imageName);
            $data['thumbnail'] = $imageName;
        }else {
            $data['thumbnail'] = '';
        }

        $data['service_id'] = $service->id;
        $data['links'] = json_encode($data['links']);
        Portfolio::query()->create($data);

      if (Auth::user()->is_admin()) {
        return redirect(route('portfolioList', [$service->id]));
      }

      return redirect(route('manage_portfolioList', [$service->id]));
    }

    public function editPortfolio(Portfolio $portfolio, Services $service) {
        $industries = Industries::orderby('name','asc')->get(['name','id']);
        return view('admin.service.portfolio_edit',[
            'type'      => 'portfolios',
            'service'   => $service,
            'portfolio'   => $portfolio,
            'industries'   => $industries,
        ]);
    }

    public function updatePortfolio(Request $request, Portfolio $portfolio, Services $service) {
      $request->validate([
        'name' => 'required',
        'timeline' => 'required',
        'project_cost' => 'required',
        'project_industry' => 'required',
        'description' => 'required',
        "screenshots.*" => "dimensions:max_width=500,max_height=250",
      ],[
        "screenshots.*" => "The screenshots images dimensions must be at most 500x250 pixels."
      ]);

        $data = $request->except('_token','preloaded');


        $allSS = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $imagefile) {
            $imageName = rand(0000, 9999).''.time().'.'.$imagefile->getClientOriginalExtension();
            $imagefile->move(public_path('assets/service'), $imageName);
            $allSS[] = $imageName;
           }
        }

        if (!empty($portfolio->screenshots)) {
            $screenshots = json_decode($portfolio->screenshots,true);
            foreach ($screenshots as $ss) {
                if (!in_array($ss, $request->preloaded ?? [])) {
                    @unlink(public_path('assets/service/'.$ss));
                    $key = array_search($ss, $screenshots);
                    if ($key !== false) {
                        unset($screenshots[$key]);
                    }
                }
            }
        }

        if (!empty($allSS)) {
            if (!empty($portfolio->screenshots)) {
                $screenshotsSave = json_encode(array_merge($allSS, $screenshots));
            }else {
                $screenshotsSave = json_encode($allSS);
            }
        }else {
            if (!empty($portfolio->screenshots)) {
                $screenshotsSave = json_encode($screenshots);
            }else {
                $screenshotsSave = '';
            }
        }

        $data['screenshots'] = $screenshotsSave??'';



        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/service'), $imageName);
            $data['thumbnail'] = $imageName;
        }

        $data['service_id'] = $service->id;
        $data['links'] = json_encode($data['links']);
        $portfolio = Portfolio::where('id',$portfolio->id)->update($data);

      if (Auth::user()->is_admin()) {
        return redirect(route('portfolioList', [$service->id]));
      }

      return redirect(route('manage_portfolioList', [$service->id]));
    }

    public function deletePortfolio(Portfolio $portfolio)
    {
        $imagePath = public_path('assets/service/'. $portfolio->thumbnail);
        if (file_exists($imagePath)) {
          unlink($imagePath);
        }

        if (!empty($portfolio->screenshots)) {
          $screenshots = json_decode($portfolio->screenshots,true);
          foreach ($screenshots as $ss) {
            $imagePath = public_path('assets/service/'. $ss);
            if (file_exists($imagePath)) {
              unlink($imagePath);
            }
          }
        }

        $portfolio->delete();
        echo 1;
        die();
    }





    public function portfolioList(Services $service) {

        return view('admin.service.portfolio_list',[
            'type'      => 'portfolios',
            'service'   => $service,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $services)
    {
      $services = Services::find($services);
      $validator = $request->validate([
        'name' => 'required',
        'tagline' => 'required',
        'founded' => 'required',
        'employees' => 'required',
        'hourly_rate' => 'required',
        'project_cost' => 'required',
        'website' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'meta.key_clients' => 'required',
      ]);
      $meta = $request->meta;
      $data = $request->except(['meta', '_token', '_method']);
      if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('assets/service'), $imageName);
        $data['logo'] = $imageName;
      }
      $meta['key_clients'] = array_column(json_decode($meta['key_clients'], true), 'value');

      Services::query()
        ->where('id', $services->id)
        ->update($data);

      $services->setManyMeta($meta);

      if (Auth::user()->is_admin()) {
        return redirect(route('service_step', ['location', $services->id]));
      }

      return redirect(route('manage_service_step', ['location', $services->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        //
    }

    public function statusChange(Request $request) {
        $service = Services::find($request->id);
        $service->status = $request->status;
        $service->save();
        echo 1;
        exit;


    }

  public function findListing(Request $request)
  {
    $data = $request->all();
    $switchingbypass = $data['switchingbypass'];
    $search = $data['query'];

    $query = Services::query()
      ->select('id as _id','name','logo', 'name as slug')
      ->where('status',1)
      ->whereNull('claimed_by')
      ->where('name', 'LIKE', "%{$search}%");

    if (!empty($switchingbypass)) {
      $query->whereNotIn('id', [$switchingbypass]);
    }
    $users = $query->get()->toArray();
    return json_encode(array('hits'=>$users));
  }
    public function import() {
        $impotred = Excel::import(new ServiceImport, Storage::path('public/home-service.xlsx'));
        return json_encode(['success'=>1]);
        // Optionally, you can return a response or redirect
    }
}

