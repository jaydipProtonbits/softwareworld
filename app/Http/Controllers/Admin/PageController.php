<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Listing;
use App\Models\Services;
use App\Models\State;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Category;
use App\Models\Industries;
use App\Models\Type;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Filter;

class PageController extends Controller
{
    public $country_id;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/page/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $filter = [];
        $items = null;
        if (!empty($request->filter)) {
            $filter = Filter::find($request->filter);
            $ids = $filter->filters ? (json_decode($filter->filters)->id ?? null) : null;
            if ($filter && $filter->type_id == 1)
            {
              $items = Services::query()
                ->whereIn('id', explode(',', $ids))
                ->get();
            }

            if ($filter && $filter->type_id == 2)
            {
              $items = Listing::query()
                ->whereIn('id', explode(',', $ids))
                ->get();
            }
        }

        $type = Type::query()->DefaultOrderBy()->get();

        session()->forget(['page_country_id', 'page_state_id', 'page_category_id']);

        return view('admin/page/create', compact('type','filter', 'items'));
    }

    public function ajaxData(Request $request)
    {
        $columns = [
              1 => 'id',
              2 => 'title',
              3 => 'type',
              4 => 'status',
            ];

            $search = [];

            $totalData = Page::count();

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
              $users = Page::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            } else {
              $search = $request->input('search.value');

              $users = Page::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

              $totalFiltered = Page::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
            }

            $data = [];

            if (!empty($users)) {
              // providing a dummy id instead of database ids
              $ids = $start;

              foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['title'] = $user->title;
                $nestedData['type'] = $user->type->name;
                $nestedData['status'] = $user->status == 1 ? 'Published' : 'Draft';
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


    public function filterValues(Request $request) {
      if ($request->type_id == 1) {
            if ($request->filter_type == 'city') {
              if (session()->has('page_state_id')){
                $cities = City::query()
                  ->where('state_id', session()->get('page_state_id'))
                  ->pluck("name", "id");

                return response()->json($cities);
              }

              return response()->json([
                'success' => false,
                'message' => 'Please select a state before choosing a city.'
              ]);
            }

            if ($request->filter_type == 'state') {
              if (session()->has('page_country_id')){
                $states = State::query()
                  ->where('country_id', session()->get('page_country_id'))
                  ->pluck("name", "id");

                return response()->json($states);
              }

              return response()->json([
                'success' => false,
                'message' => 'Please select a country before choosing a state.'
              ]);
            }

            if ($request->filter_type == 'sub_category') {
              if (session()->has('page_category_id')){
                $sub_categories = Category::query()
                  ->where('parent_id', session()->get('page_category_id'))
                  ->pluck("name", "id");

                return response()->json($sub_categories);
              }

              return response()->json([
                'success' => false,
                'message' => 'Please select a category before choosing a sub category.'
              ]);
            }

            if ($request->filter_type == 'industry') {
                $industry = Industries::pluck('name','id');
                return response()->json($industry);
            }

            if ($request->filter_type == 'hourly_rate') {
                $rates = HourlyRate();
                return response()->json($rates);
            }

            if ($request->filter_type == 'employee_count') {
                $rates = EmployeesSize();
                return response()->json($rates);
            }

        }

        if ($request->type_id == 2) {
            if ($request->filter_type == 'industries') {
                $industries = Industries::query()->pluck('name','id');
                return response()->json($industries);
            }

            if ($request->filter_type == 'language') {
              $languages = languagesSupported();
              return response()->json($languages);
            }

            if ($request->filter_type == 'license_model') {
              return response()->json(['Proprietary' => 'Proprietary', 'Open Source' => 'Open Source']);
            }

            if ($request->filter_type == 'pricing_model') {
              return response()->json([
                'free_version' => 'Free Version',
                'free_trial' => 'Free trial'
              ]);
            }

            if ($request->filter_type == 'feature') {
                $feature = Feature::pluck('name','id');
                return response()->json($feature);
            }

            if ($request->filter_type == 'feature') {
                $feature = Feature::pluck('name','id');
                return response()->json($feature);
            }

            if ($request->filter_type == 'payment_frequency') {
                return response()->json([
                  'free_version' => 'Free Version',
                  'free_trial' => 'Free trial'
                ]);

                $pricingModel = array_combine(pricingFrequency(), pricingFrequency());
                return response()->json($pricingModel);
            }

            if ($request->filter_type == 'device_supported') {
                $deviceSupported = array_combine(deviceSupported(), deviceSupported());
                return response()->json($deviceSupported);
            }

            if ($request->filter_type == 'software_development_type') {
                $softwareDevelopment = array('Cloud Hosted'=>'Cloud Hosted', 'On-Premise'=>'On-Premise');
                return response()->json($softwareDevelopment);
            }

            if ($request->filter_type == 'target_company_size') {
                $companySize = array_combine(companySize(), companySize());
                return response()->json($companySize);
            }

            if ($request->filter_type == 'deployment') {
                $companySize = array_combine(companySize(), companySize());
                return response()->json($companySize);
            }
        }

        if ($request->filter_type == 'category') {
            $category = Category::where('type_id',$request->type_id)->pluck('name','id');
            return response()->json($category);
        }


        if ($request->filter_type == 'review') {
            $rcount = getReviewCount();
            return response()->json($rcount);
        }

        if ($request->filter_type == 'country') {
            $countries = Country::pluck("name", "id");
            return response()->json($countries);
        }
    }

    public function storedFilterValues(Request $request) {
      if ($request->filter_type == 'country') {
        session()->put('page_country_id', $request->all()['filter_value']);
      }

      if ($request->filter_type == 'state') {
        session()->put('page_state_id', $request->all()['filter_value']);
      }

      if ($request->filter_type == 'category') {
        session()->put('page_category_id', $request->all()['filter_value']);
      }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'      => 'required',
            'type_id'      => 'required',
            'slug'      => 'required',
            'heading_one'      => 'required',
            'heading_two'      => 'required',
            'description'      => 'required',
            'meta_title'      => 'required',
            'meta_description'      => 'required',
            'status'      => 'required',
        ],[
            'heading_one.required' => 'The title H1 is required field',
            'heading_two.required' => 'The title H2 is required field',
            'meta_title.required' => 'The meta title is required field',
            'meta_keyword.required' => 'The meta keyword is required field',
            'meta_description.required' => 'The meta keyword is required field',
        ]);

        $ids = null;
        if ($request->has('filter_id')) {
          $filter = Filter::query()
            ->where('id', $request->all()['filter_id'])
            ->first();

          if ($filter && $filter->filters) {
            $ids = json_decode($filter->filters)->id ?? null;
          }
        }

        $insert = $request->except('_token','filter_type','filter_val','meta_keyword');
        $insert['filter'] = (!empty($request->filter_type) && !empty($request->filter_val) || $ids) ? json_encode(array('filter_type' => $request->filter_type, 'filter_val' => $request->filter_val, 'id' => $ids)) : '';

        $insert['meta_keyword'] = !empty($request->meta_keyword) ? json_encode(array_column(json_decode($request->meta_keyword,true), 'value')) : '';

        Page::query()->create($insert);

          /*----  // Create Store Procedure ----*/
        // Page::createView($request);

        return redirect(route('page.index'))->with('success','Page has been created successfully.');

    }

    public function edit(Page $page)
    {
        $ids = null;
        if ($page && $page->filter)
        {
          $ids = json_decode($page->filter)->id ?? null;
        }

        $items = null;
        if ($ids) {
          if ($page->type_id == 1)
          {
            $items = Services::query()
              ->whereIn('id', explode(',', $ids))
              ->get();
          }

          if ($page->type_id == 2)
          {
            $items = Listing::query()
              ->whereIn('id', explode(',', $ids))
              ->get();
          }
        }

        $type = Type::query()->DefaultOrderBy()->get();
        return view('admin/page/edit', compact('type','page', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $validator = $request->validate([
            'title'      => 'required',
            'type_id'      => 'required',
            'slug'      => 'required',
            'heading_one'      => 'required',
            'heading_two'      => 'required',
            'description'      => 'required',
            'meta_title'      => 'required',
            'meta_description'      => 'required',
            'status'      => 'required',
        ],[
            'heading_one.required' => 'The title H1 is required field',
            'heading_two.required' => 'The title H2 is required field',
            'meta_title.required' => 'The meta title is required field',
            'meta_keyword.required' => 'The meta keyword is required field',
            'meta_description.required' => 'The meta keyword is required field',
        ]);

        $insert = $request->except('_token','_method','filter_type','filter_val','meta_keyword');
        $insert['filter'] = (!empty($request->filter_type) && !empty($request->filter_val)) ? json_encode(array('filter_type'=>$request->filter_type, 'filter_val'=>$request->filter_val)) : '';


        $insert['meta_keyword'] = !empty($request->meta_keyword) ? json_encode(array_column(json_decode($request->meta_keyword,true), 'value')) : '';

        $addPAge = Page::where('id',$page->id)->update($insert);
        return redirect(route('page.index'))->with('success','Page has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        echo 1;
        exit;
    }
}
