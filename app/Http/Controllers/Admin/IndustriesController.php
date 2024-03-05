<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industries;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industries::orderby('name', 'desc')->get();
        return view('admin/industries/index', compact('industries'));
    }

    public function ajaxData(Request $request)
    {
        $columns = [
              1 => 'id',
              2 => 'name',
            ];

            $search = [];

            $totalData = Industries::count();

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
              $users = Industries::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            } else {
              $search = $request->input('search.value');

              $users = Industries::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

              $totalFiltered = Industries::where('id', 'LIKE', "%{$search}%")
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
        $industries = Industries::orderby('id', 'desc')->get();
        return view('admin/industries/create', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = $request->validate([
            'name'      => 'required',
        ]);

        Industries::create([
            'name' => $request->name,
        ]);
        return redirect(route('industries.index'))->with('success','Industries has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Industries $industries)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industries $industry)
    {
        $industries = $industry;
        return view('admin/industries/edit', compact('industries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industries $industry)
    {
        $validator = $request->validate([
            'name'      => 'required',
        ]);

        $industry->name =  $request->name;
        $industry->save();
        
        return redirect(route('industries.index'))->with('success','Industries has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industries $industry)
    {
        $industry->delete();
        echo 1;
        die();
    }
}
