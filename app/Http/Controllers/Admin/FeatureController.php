<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::query()->orderBy('id', 'desc')->with('category')->get();
        return view('admin/features/index', compact('features'));
    }

    public function ajaxData(Request $request)
    {
        $columns = [
              1 => 'id',
              2 => 'name',
              3 => 'category',
            ];

            $search = [];
            \DB::statement("SET SQL_MODE=''");

            $totalData = Feature::groupBy('category_id')->get()->count();




            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
                $users = Feature::with('category')
                ->selectRaw('id, category_id, name ,GROUP_CONCAT(CONCAT(features.name) SEPARATOR \', \') AS features_list')
                ->groupBy('category_id')
                ->offset($start)
                ->limit($limit)
                ->get();


            } else {
                $search = $request->input('search.value');

                $users = Feature::where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->selectRaw('id, category_id, name ,GROUP_CONCAT(CONCAT(features.name) SEPARATOR \', \') AS features_list')
                    ->groupBy('category_id')
                    ->offset($start)
                    ->limit($limit)
                    ->get();

                $totalFiltered = Feature::where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->selectRaw('id, category_id, name ,GROUP_CONCAT(CONCAT(features.name)) AS features_list')
                    ->groupBy('category_id')
                    ->count();
            }

            $data = [];

            if (!empty($users)) {
              // providing a dummy id instead of database ids
              $ids = $start;



              foreach ($users as $key => $user) {
                $nestedData['id'] = !empty($user->category)? $user->category->id : '';
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = !empty($user->category) ? $user->category->name : '';
                $nestedData['category'] = $user->features_list;
                $data[] = $nestedData;
              }
            }

            if ($data) {
              return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
              ]);
            } else {
              return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
              ]);
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()
          ->where('type_id',2)
          ->DefaultOrderBy()
          ->get();

        return view('admin/features/create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $validator = $request->validate([
            'name'      => 'required',
        ]);
        $children = collect($request->name)->map(function ($child) use ($request) {
            return [
                'category_id' => $request->category_id,
                'name' => $child,
            ];
        });
        Feature::insert($children->toArray());
        return redirect(route('features.index'))->with('success','Feature has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $features)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category_id)
    {
        $features = Feature::where('category_id',$category_id)->orderby('id','asc')->get();
        $category = Category::where('type_id',2)->DefaultOrderBy()->get();

        return view('admin/features/edit', compact('features','category','category_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category_id)
    {

        /*dd($category_id, $request);*/


        $validator = $request->validate([
            'name'      => 'required',
            'category_id'      => 'required',
        ]);
        $OnlyIds = [];
        foreach ($request->name as $key => $value) {
            if (array_key_first($value) != 0) {
                $feature = Feature::find(array_key_first($value));
                $OnlyIds[] = array_key_first($value);
                $feature->category_id =  $request->category_id;
                $feature->name =  $value[array_key_first($value)];
                $feature->save();
            }else{
                $ids = Feature::create(['category_id'=>$request->category_id, 'name'=>$value[array_key_first($value)]]);
                $OnlyIds[] = $ids->id;
            }
        }
        if (!empty($OnlyIds)) {
            $get = Feature::where('category_id',$request->category_id)->whereNotIn('id',$OnlyIds)->delete();
        }
        return redirect(route('features.index'))->with('success','Feature has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Feature::where('category_id',$id)->delete();
        echo 1;
        die();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteFeatures($id)
    {
        Feature::where('category_id',$id)->delete();
        echo 1;
        die();
    }
}
