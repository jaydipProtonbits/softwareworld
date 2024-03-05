<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  /**
   * Redirect to user-management view.
   *
   */
  public function index()
  {
    $users = User::all();
    $userCount = $users->count();
    $verified = User::whereNotNull('email_verified_at')->get()->count();
    $notVerified = User::whereNull('email_verified_at')->get()->count();
    $usersUnique = $users->unique(['email']);
    $userDuplicates = $users->diff($usersUnique)->count();

    return view('admin.user.index', [
      'totalUser' => $userCount,
      'verified' => $verified,
      'notVerified' => $notVerified,
      'userDuplicates' => $userDuplicates,
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function UserManagement(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'name',
      3 => 'email',
      4 => 'role',
      5 => 'date',
    ];

    $search = [];

    $totalData = User::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = User::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = User::where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = User::where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($users)) {
        $ids = $start;
        foreach ($users as $user) {
              $nestedData['id'] = $user->id;
              $nestedData['fake_id'] = ++$ids;
              $nestedData['profile_pic'] = $user->profile_pic ? asset('assets/users').'/'.$user->profile_pic : '';
              $nestedData['name'] = $user->name;
              $nestedData['email'] = $user->email;
              $nestedData['role'] = $user->roles->pluck('name')[0]??'';
              $nestedData['date'] = date("d-m-Y h:i", strtotime($user->created_at));

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
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::query()->orderBy('name', 'asc')->get();
    return view('admin.user.create',['roles'=>$roles]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'name'      => 'required',
            'email'      => 'required|unique:users',
            'role'      => 'required',
            'password'      => 'required|required_with:c_password|same:c_password',
            'c_password'      => 'required',
        ],[
          'password.same'=>'Password and confirm password not matched'
        ]);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/users'), $imageName);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'profile_pic' => $imageName??'',
        ]);
        $user->assignRole($request->role);
        return redirect(route('users.index'))->with('success','User has been created successfully.');

    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
        $roles = Role::query()->orderBy('name', 'asc')->get();
        return view('admin.user.edit',['roles'=>$roles, 'user'=> $user]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
        $validator = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email,'.$user->id,
            'role'      => 'required',
        ]);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/users'), $imageName);
            if(!empty($user->profile_pic)){
                unlink(public_path('assets/users').'/'.$user->profile_pic);
            }
        }
        if (!empty($request->password)) {
            if ($request->password == $request->c_password) {
                $user->password = \Hash::make($request->password);
            }else{
                $validator = $request->validate([
                    'password'      => 'required_with:c_password|same:c_password',
                    'c_password'      => 'required',
                ],[
                  'password.same'=>'Password and confirm password not matched'
                ]);
            }
        }
        if (!empty($imageName)) {
            $user->profile_pic = $imageName;
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with('success','User has been updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $users = User::where('id', $id)->delete();
    return 1;
  }
}
