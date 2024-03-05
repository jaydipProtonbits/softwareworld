<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderby('id', 'desc')->get();
        return view('admin/types/index', compact('types'));
    }

    public function ajaxData(Request $request)
    {
        $columns = [
              1 => 'id',
              2 => 'name',
            ];

            $search = [];

            $totalData = Type::count();

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
              $users = Type::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            } else {
              $search = $request->input('search.value');

              $users = Type::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

              $totalFiltered = Type::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
            }

            $data = [];

            if (!empty($users)) {
              // providing a dummy id instead of database ids
              $ids = $start;

              foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $user->name;
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
        $types = Type::orderby('id', 'desc')->get();
        return view('admin/types/create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = $request->validate([
            'name'      => 'required',
        ]);

        Type::create([
            'name' => $request->name,
        ]);
        return redirect(route('type.index'))->with('success','Type has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $types)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $type = $type;
        return view('admin/types/edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validator = $request->validate([
            'name'      => 'required',
        ]);

        $type->name =  $request->name;
        $type->save();
        
        return redirect(route('type.index'))->with('success','Type has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        echo 1;
        die();
    }
}
