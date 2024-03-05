<?php

namespace App\Http\Controllers\Admin\Claims;

use App\Http\Controllers\Controller;
use App\Mail\Claims\ClaimMail;
use App\Models\Claim;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClaimController extends Controller
{
    public function index()
    {
      return view('admin.claims.index');
    }

    public function store(Request $request) {
      $columns = [
        'id',
        'type_id',
        'claimed_id',
        'email',
        'status',
        'actions',
      ];

      $start  = $request->all()['start'];
      $limit  = $request->all()['length'];
      $order  = $columns[$request->input('order.0.column')];
      $dir    = $request->input('order.0.dir');

      $recordsTotal = $recordsFiltered = Claim::findByCount();

      $itemData = Claim::findBy($start, $limit, $order, $dir);

      return [
        'draw'              => $request->all()['draw'],
        'recordsTotal'      => $recordsTotal,
        'recordsFiltered'   => $recordsFiltered,
        'data'              => $itemData
          ? $itemData->map( function ($claim) {
            return [
              'id' => $claim->id,
              'type_id' => $claim->type->name??'',
              'claimed_id' => $claim->claim->name??'',
              'email' => $claim->email,
              'status' => ucwords(str_replace("_", " ", $claim->status)),
              'created_at' => Carbon::parse($claim->created_at)->format('Y-m-d H:i A'),
              'actions' => $this->getAction($claim)
            ];
          })
          : []
      ];
    }

    private function getAction($claim) {
      return '<a href="javascript:void(0)" class="approved_claim" data-id="'.$claim->id.'" data-toggle="tooltip" title="Approve claim"><i class="fa fa-file-edit text-primary"></i></a>';
    }

    public function update(Claim $claim)
    {
      if ($claim->status == 'email_verified')
      {
        $claim->update([
          'status' => 'approved',
          'approved_at' => Carbon::now(),
          'approved_by' => Auth::user()->id,
        ]);

        // Find a user through the Email
        $user = User::query()
          ->where('email', $claim->email)
          ->first();
          
        if ($user)
        {
          // Trigger a Approve Claim email
          Mail::to($user->email)->send(new ClaimMail($user, 'Approved'));

          $claim->claim()->update([
            'claimed_by' => $user->id,
          ]);

          return response()->json(['success' => true]);
        }

        // if not found then create a new one
        $user = new User;
        $user->name = $claim->first_name.' '.$claim->first_name;
        $user->email = $claim->email;
        $user->password = md5(rand(1,10000));
        $user->claim_token = Str::random(32);
        $user->save();
        $user->assignRole('vendor');

        $claim->claim()->update([
          'claimed_by' => $user->id,
        ]);
        // Trigger a Approve Claim email
        // Added the Complete profile button
        Mail::to($user->email)->send(new ClaimMail($user, 'Approved'));

        // Through the Mail new created user will be complete their profile details and map with listing

        return response()->json(['success' => true]);
      }

      return response()->json(['success' => false]);
    }

    public function create(Request $request)
    {
      if (!$request->has('token'))
      {
        return abort(401);
      }

      $user = User::query()
        ->where('claim_token', $request->all()['token'])
        ->first();

      if (!$user) {
        return abort(401);
      }

      $user->claim_token = null; // Optionally clear the token after verification
      $user->save();

      return to_route('/');
    }
}
