<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Category;
use App\Models\Industries;
use App\Models\Type;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Services;
use App\Models\Listing;
use App\Models\Filter;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::query()->DefaultOrderBy()->get();
        session()->forget(['category_id', 'country_id', 'state_id', 'city_id']);

        return view('admin/filter/create', compact('type'));
    }


    public function search(Request $request) {
        if (!empty($request->type_id)) {
            $columns = [
              1 => 'id',
              2 => 'name',
              3 => 'created_at',
            ];
            $limit = $request->input('length');
            $start = $request->input('start');

            if ($request->filter_val || true) {
                $Filter = ChangeArray($request->filter_type ?? [], $request->filter_val ?? []);
                if ($request->type_id == 2)
                {
                    $query = Listing::query();
                    if (!empty($Filter)) {
                        foreach ($Filter as $k => $val) {
                            if ($k == 'category' && !empty($val)) {
                                foreach ($val as $v) {
                                    $query->whereJsonContains('categories', (string)$v);
                                }
                            }
                            if ($k == 'feature' && !empty($val)) {
                                foreach ($val as $v) {
                                    $query->whereMeta('features', 'like', '%"'.$v.'"%' );
                                }
                            }
                            if ($k == 'industries' && !empty($val)) {
                              foreach ($val as $v) {
                                $query->whereMeta('target_industry', 'like', '%"'.$v.'"%' );
                              }
                            }
                            if ($k == 'language' && !empty($val)) {
                              foreach ($val as $v) {
                                $query->whereMeta('languages_supported', 'like', '%"'.$v.'"%' );
                              }
                            }
                            if ($k == 'license_model' && !empty($val)) {
                              foreach ($val as $v) {
                                $query->whereMeta('licensing_model', $v);
                              }
                            }
                            if ($k == 'pricing_model' && !empty($val)) {
                              foreach ($val as $v) {
                                if ($v == 'free_version')
                                {
                                  $query->whereMeta('is_free_version', 1);
                                }
                                if ($v == 'free_trial')
                                {
                                  $query->whereMeta('is_free_trail', 1);
                                }
                              }
                            }

                            if ($k == 'country' && !empty($val)) {
                                $query->whereMetaIn('country', $val );

                            }
                            if ($k == 'payment_frequency' && !empty($val)) {
                                $query->whereMetaIn('payment_frequency', $val );

                            }
                            if ($k == 'device_supported' && !empty($val)) {
                              $query->where( function ($q) use ($val) {
                                foreach ($val as $v) {
                                  $q->orWhere(fn($_query) => $_query->whereMeta('device_supported', 'like', '%'."$v".'%'));
                                }
                              });
                            }
                            if ($k == 'software_development_type' && !empty($val)) {
                                $query->where( function ($q) use ($val) {
                                  foreach ($val as $v) {
                                    $q->orWhere(fn($_q) => $_q->whereMeta('software_development_type', 'like', '%'."$v".'%'));
                                  }
                                });
                                    /*----  Old Query ----*/
                                /*foreach ($val as $v) {
                                    $query->orWhere(fn ($sqb) => $sqb->whereMeta('software_development_type', 'like', '%'."$v".'%'));
                                }*/
                            }
                            if ($k == 'target_company_size' && !empty($val)) {
                                $query->whereMetaIn('target_company_size', $val );

                            }
                        }
                    }
                }
                else
                {
                    $query = Services::query();
                    if (!empty($Filter)) {
                        foreach ($Filter as $k => $val) {
                            if ($k == 'category' && !empty($val)) {
                                session()->put('category_id', $val);
                                session()->put('page_category_id', $val);

                                $query->whereHas('category', function ($query) use ($val) {
                                    $query->whereIn('category_id',$val);
                                });
                            }
                            if ($k == 'industry' && !empty($val)) {
                                foreach ($val as $v) {
                                    $query->whereMeta('client_industry','like','%"industry_id":"'.$v.'"%');
                                }
                            }
                            if ($k == 'hourly_rate' && !empty($val)) {
                                $query->whereIn('hourly_rate',$val);
                            }
                            if ($k == 'country' && !empty($val)) {
                                session()->put('country_id', $val);
                                session()->put('page_country_id', $val);

                                $query->whereIn('country',$val);
                            }
                            if ($k == 'state' && !empty($val)) {
                                session()->put('state_id', $val);
                                session()->put('page_state_id', $val);

                                $query->whereIn('state',$val);
                            }
                            if ($k == 'city' && !empty($val)) {
                                session()->put('city_id', $val);
                                session()->put('page_city_id', $val);

                                $query->whereIn('city',$val);
                            }
                            if ($k == 'employee_count' && !empty($val)) {
                                $query->whereIn('employees',$val);
                            }
                        }
                    }

                }
                $cquery = $query;
                $listing = $query->offset($start)->limit($limit)->orderBy('id', 'desc')->get();

                $totalFiltered = $cquery->count();
                $totalData = Listing::count();

                $data = [];

                if (!empty($listing)) {
                    $ids = $start;
                    foreach ($listing as $list) {
                        $nestedData['checkbox'] = '<input type="checkbox" class="software_id" value="'.$list->id.'">';
                        $nestedData['id'] = $list->id;
                        $nestedData['fake_id'] = ++$ids;
                        $nestedData['name'] = $list->name;
                        $nestedData['date'] = date("d-m-Y h:i", strtotime($list->created_at));
                        $data[] = $nestedData;
                    }
                }
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = $request->validate([
            'type_id'      => 'required',
        ],[
            'type_id.required' => 'The type  is required field'
        ]);

        $insert = $request->except('_token','filter_type','filter_val');
        $insert['filters'] = (!empty($request->filter_type) && !empty($request->filter_val) || !empty($request->software_ids)) ? json_encode(array(
          'filter_type' => $request->filter_type,
          'filter_val' => $request->filter_val,
          'id' => $request->software_ids
        )) : '';

        $filter = Filter::create($insert);
        return redirect(url('admin/page/create?filter='.$filter->id));

    }

    /**
     * Display the specified resource.
     */
    public function show(Filter $filter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filter $filter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filter $filter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filter $filter)
    {
        //
    }
}
