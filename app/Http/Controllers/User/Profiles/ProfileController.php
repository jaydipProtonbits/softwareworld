<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Users\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
      $countries = Country::query()->get();

      return view('front.user.profile', compact('countries'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string',
        'email' => 'required',
        'linkedin_url' => 'nullable|url'
      ]);

      UserDetail::query()
        ->updateOrCreate($request->only('user_id'), $request->only([
          'country_id', 'company_name', 'company_site', 'job_title', 'linkedin_url'
        ]));

      if ($request->hasFile('profile_pic')) {
        /*$request->validate([
          'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);*/

        $file = $request->file('profile_pic');
        $imageName = time().'.'.$file->getClientOriginalName();

        try {
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

      return redirect()->back()->with(['success' => 'Profile updated successfully']);
    }
}
