<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::query()->DefaultOrderBy()->get();
        $category = Category::query()->DefaultOrderBy()->get();
        return view('admin/category/index', compact('types', 'category'));
    }

    public function ajaxData(Request $request)
    {
        $columns = [
          1 => 'id',
          2 => 'name',
          3 => 'type',
          4 => 'parent_id',

        ];
        $search = [];
        $totalData = Category::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $typeSearch = $request->input('columns.3.search.value');
        $CatSearch = $request->input('columns.4.search.value');

        if (empty($request->input('search.value')) && empty($typeSearch) && empty($CatSearch) ) {
          $users = Category::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
        } else {

          $search = $request->input('search.value');
          $users = Category::query()
            ->when($typeSearch, function ($query) use ($typeSearch) {
                if (!empty($typeSearch)) {
                    $query->where('type_id', $typeSearch);
                }
            })
            ->when($CatSearch, function ($query) use ($CatSearch) {
                if (!empty($CatSearch)) {
                    $query->where('parent_id', $CatSearch);
                }
            })
            ->when($search, function ($query) use ($search) {
                if (!empty($search)) {
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('type',function($query) use ($search){
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('parent',function($query) use ($search){
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

          $totalFiltered = Category::query()
            ->when($typeSearch, function ($query) use ($typeSearch) {
                if (!empty($typeSearch)) {
                    $query->where('type_id', $typeSearch);
                }
            })
            ->when($CatSearch, function ($query) use ($CatSearch) {
                if (!empty($CatSearch)) {
                    $query->where('parent_id', $CatSearch);
                }
            })
            ->when($search, function ($query) use ($search) {
                if (!empty($search)) {
                    $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('type',function($query) use ($search){
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('parent',function($query) use ($search){
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
                }
            })
            ->count();
        }

        $data = [];

        if (!empty($users)) {
          // providing a dummy id instead of database ids
          $ids = $start;

          foreach ($users as $user) {
            $nestedData['id'] = $user->id;
            $nestedData['fake_id'] = ++$ids;
            $nestedData['name'] = $user->name??'';
            $nestedData['parent_id'] = $user->parent->name??'';
            $nestedData['type'] = $user->type->name??'';


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

    public function getCategory($type) {
        if (!empty($type)) {
            $categories = Category::query()
              ->where('type_id',$type)
              ->DefaultOrderBy()
              ->get()
              ->pluck('name','id');
            return response()->json([
                'status'=>1,
                'data' => $categories
            ]);
        }
        return response()->json([
                'status'=>0,
                'data' => []
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->DefaultOrderBy()->get();
        $type = Type::query()->get();

        return view('admin/category/create', compact('categories', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = $request->validate([
            'name'      => 'required',
            'type_id'      => 'required',
            'parent_id' => 'nullable|numeric'
        ]);

        Category::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'parent_id' =>$request->parent_id,

        ]);
        return redirect(route('category.index'))->with('success','Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $type = Type::query()->DefaultOrderBy()->get();
        $categories = Category::query()
          ->where('type_id',$category->type_id)->DefaultOrderBy()->get();

        return view('admin/category/edit', compact('categories','category','type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
            'name'      => 'required',
            'type_id'      => 'required',
            'parent_id' => 'nullable|numeric'
        ]);

        $category->name =  $request->name;
        $category->type_id =  $request->type_id;
        $category->parent_id = $request->parent_id;

        $category->save();

        return redirect(route('category.index'))->with('success','Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        echo 1;
        die();
    }

    public function import()
    {
        $impotred = Excel::import(new CategoryImport, Storage::path('public/Service-Import.xlsx'));
        return json_encode(['success'=>1]);
    }
}
