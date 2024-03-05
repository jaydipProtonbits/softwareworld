<?php

namespace App\Http\Controllers\Web\Front;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Front\ProcedureModel;
use App\Models\Industries;
use App\Models\Listing;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\State;
use App\Models\Users\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public $page_limit = 0;

    public function __construct()
    {
      $this->page_limit = ProcedureModel::PAGINATION_LIMIT;
    }
public function home()
{

  return view('front.web.home');
  
}
  public function index()
    {
      return view('front.web.landing');
    }

    public function show(Request $request, $slug = null)
    {
      if ($slug) {
        $page = Page::query()
          ->where('slug', $slug)
          ->first();

        if (!$page)
          abort(404);

        $listing = Page::getByFilter($page);

              /*----  Procedure Call  ----*/
        /*$procedureModel = new ProcedureModel($page->type_id);
        $listing_count = count($procedureModel->callProcedure($page->slug, 0, 999999));
        $page_count = $this->page_limit;
        $start = 1;
        $limit = $page_count;
        $current_page = 1;
        if ($request->has('page')) {
          $start = ($request->input('page') - 1) * $page_count;
          $limit = $request->input('page') * $page_count;
          $current_page = $request->input('page');
        }
        $listing = $procedureModel->callProcedure($page->slug ,$start, $limit);*/

        $countries = Country::query()->get(['name', 'id']);

        return view('front.web.landing', compact('page', 'listing', 'countries'));
      }

      return abort(404);
    }

    public function view($slug = null)
    {
      if ($slug) {
        $page = Page::query()
          ->where('slug', $slug)
          ->first();

        if (!$page)
          abort(404);

                /*----  Procedure Call  ----*/
        /*$procedureModel = new ProcedureModel($page->type_id);
        $listing = $procedureModel->callProcedure($page->slug);*/

        $listing = Page::getByFilter($page);
        $countries = Country::query()->get(['name', 'id']);

        return view('front.web.service', compact('listing', 'page', 'countries'));
      }

      return abort(404);
    }

    public function listingDetails($type, $name)
    {
      $name = str_replace('-', ' ', $name);
      if ($type == 'service')
      {
        $listing = Services::query()
          ->where('name', $name)
          ->with('portfolio')
          ->first();
        if (! $listing)
        {
          return abort(404);
        }

        $country_name = Country::query()
          ->where("id", $listing->country)
          ->first()->name ?? '';

        $state_name = State::query()
          ->where("id",$listing->state)
          ->first()->name ?? '';

        $city_name = City::query()
          ->where("id",$listing->city)
          ->first()->name ?? '';

        $industries = $listing->getMeta('client_industry');
        $industries_labels = [];
        $industries_data = [];
        if ($industries)
        {
          foreach ($industries as $industry)
          {
            $industries_labels[] = Industries::query()
                ->where('id', $industry['industry_id'])
                ->first()
                ->name ?? 'name';

            $industries_data[] = $industry['percentage'];
          }
        }

        $services = DB::table('service_category')
          ->where([
            'service_id' => $listing->id,
            'parent_category_id' => 0
          ])
          ->get();

        $service_labels = [];
        $service_data = [];
        foreach ($services ?? [] as $service) {
          $service_labels[] = Category::query()
              ->where('id', $service->category_id)
              ->first()
              ->name ?? '';

          $service_data[] = $service->percentage;
        }

        $locations = $listing->getMeta('locations',array());
        $location_data = [];
        if ($locations) {
          foreach ($locations as $key => $location) {
            if (!isset($location_data[$key])) {
              $location_data[$key]['country_name'] = Country::query()
                  ->where("id", $location['country'])
                  ->first()
                  ->name ?? '';

              $location_data[$key]['state_name'] = State::query()
                  ->where("id", $location['state'])
                  ->first()
                  ->name ?? '';

              $location_data[$key]['city_name'] = City::query()
                  ->where("id", $location['city'])
                  ->first()
                  ->name ?? '';
            }
          }
        }

        $key_clients = $listing->getMeta('key_clients',array());

        return view('front.web.service.index', compact('listing', 'country_name', 'state_name', 'city_name', 'location_data', 'industries_labels', 'industries_data', 'service_labels', 'service_data', 'key_clients'));
      }
      else
      {
        $listing = Listing::query()->where('name', $name)->first();
console.log($listing);
        if (!$listing)
        {
          return abort(404);
        }
        $industries = Industries::query()->get(['name','id']);
        $countries = Country::query()->get(['name', 'id']);

        return view('front.web.software.index', compact('listing', 'countries', 'industries'));
      }
    }

    public function getPortfolio($id)
    {
      $portfolio = Portfolio::query()
          ->where('id', $id)
          ->with('industry')
          ->first() ?? [];

      return response()->json([
        'success' => true,
        'portfolio_html' => view('front.web.single_portfolio', compact('portfolio'))->render()
      ]);
    }

    public function writeReview($type, $listing_name)
    {
      if (Auth::check() && Auth::user()->is_reviewer()) {
        $countries = Country::query()->get(['name', 'id']);
        $active_tab = \request()->has('active_tab') ? \request()->all()['active_tab'] : 'profile';

        if ($type == 'software')
        {
          $listing = Listing::query()
            ->where('name', $listing_name)
            ->first();

          return view('front.web.software.partials.review', compact('listing', 'countries', 'active_tab'));
        }
        else
        {
          $listing = Services::query()
            ->where('name', $listing_name)
            ->first();

          dd($listing);
        }
      }

      return to_route('login');
    }

    public function storeReview(Request $request)
    {
      if ($request->all()['store'] == 'reviewer_details')
      {
        $request->validate([
          'name' => 'required|string',
          'email' => 'required'
        ]);

        UserDetail::query()
          ->updateOrCreate($request->only('user_id'), $request->only([
            'country_id', 'company_name', 'company_site', 'job_title', 'linkedin_url'
          ]));

        if ($request->hasFile('profile_pic'))
        {
          $file = $request->file('profile_pic');
          $imageName = time().'.'.$file->getClientOriginalName();

          try
          {
            $file->move(public_path('assets/users'), $imageName);

            /*// Need to remove the old file*/
            $oldImage = Auth::user()->profile_pic;
            /*// Delete the old image if it exists*/
            if ($oldImage) {
              $oldImagePath = public_path('assets/users/' . $oldImage);
              if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
              }
            }

            Auth::user()->update([
              'profile_pic' => $imageName ?? '',
            ]);

          } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading file: '.$e->getMessage());
          }
        }

        return redirect(route('front_write_review', ['software', $request->all()['listing_name']]).'?active_tab=usage')->with(['success' => 'Profile updated successfully']);
        //return redirect()->back()->with(['success' => 'Profile updated successfully']);
      }
    }

    public function directories($type)
    {
        if ($type == 'services') {
            /*$listing = Category::query()
              ->where('type_id',1);
            $parents = clone $listing;
            $parents = $parents->where('parent_id',null)
              ->with('service_mappings')
              ->get();

            $services = Services::query()
              ->where('status', 1)
              ->whereHas('service_mappings')
              ->get();*/

            /*$category = \App\Models\Category::query()->with('service_mappings')->find(312);

            return $category->service_mappings->map(function($mapp) {
              $type = \App\Models\Front\TypeMapping::query()
                ->where('id', $mapp->pivot->type_mapping_id)
                ->first();


              return \App\Models\Front\TypeMapping::findSubType($type->service_type_id)
                ->with( 'service_sub_type')
                ->get()
                ->map(function ($item) use ($type) {
                  return $item->service_sub_type->name;
                });
            });*/

            /*return view('front.web.browse-service', [
              'listing' => $listing,
              'parents'=>$parents,
              'services' => $services,
            ]);*/
            $listing = Page::where('type_id',1)->where('status',1);
            return view('front.web.browse-service',['listing'=>$listing]);

        }elseif($type == 'software') {
            $listing = Page::where('type_id',2)->where('status',1);
            return view('front.web.browse-software',['listing'=>$listing]);
        }else {
            return abort(404);
        }
    }

    public function liveSearch(Request $request) {
        $search = $request->search;
        $service = Services::where('name','like',"%$search%")->limit(5)->get();
        $software = Listing::where('name','like',"%$search%")->limit(5)->get();
        $page = Page::where('title','like',"%$search%")->limit(5)->get();
        return view('front.web.search-dropdown',compact('service', 'software', 'page', 'search'));
    }

    public function pageSearch(Request $request) {
        $search = $request->all()['query'];
        $not_found = false;
        if (!empty($search)) {
            $service = Services::where('name','like',"%$search%")->get();
            $software = Listing::where('name','like',"%$search%")->get();
            $page = Page::where('title','like',"%$search%")->get();
        }else{
            $service = $software = $page = [];
            $not_found = true;
        }
        return view('front.web.search-all',compact('service', 'software', 'page', 'search', 'not_found'));
    }
}