<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Mail\SettingMail;
use App\Models\Settings;
use App\Models\Users\Settings\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SettingController extends Controller
{
  public function store(Request $request)
  {
    if ($request->all()['type'] == 'email_details')
    {
      return self::emailDetails($request);
    }
    elseif ($request->all()['type'] == 'change_password')
    {
      return self::changePassword($request);
    }

    return redirect()->back()->with(['error' => 'Something went wrong!']);
  }

  private static function emailDetails(Request $request)
  {
    $request->validate([
      'company_name' => 'required',
      'company_site' => 'required|url',
      'old_email' => 'required|email',
      'new_email' => 'required|email',
      'reason' => 'required'
    ]);

    if (auth()->user()->email != $request->old_email) {
      return redirect()->back()->with(['error' => 'The old email is incorrect.']);
    }

    UserSetting::query()
      ->updateOrCreate($request->only('user_id'), $request->only([
        'company_name',
        'company_site',
        'old_email',
        'new_email',
        'reason',
      ]));

    // Trigger a verify mail to the vendor
    Mail::to(auth()->user()->email)->send(new SettingMail(auth()->user(), Str::random(36)));

    return redirect()->back()->with(['success' => 'Details updated successfully, Check your email']);
  }

  private static function changePassword(Request $request)
  {
    try {
      $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required',
        'confirm_password' => 'required|same:new_password',
      ]);

      // Check if the current password matches the user's password
      if (!Hash::check($request->current_password, auth()->user()->password)) {
        return redirect()->back()->with(['error' => 'The current password is incorrect.']);
      }

      // Update the user's password
      auth()->user()->update([
        'password' => Hash::make($request->new_password),
      ]);

      return redirect()->back()->with('success', 'Password changed successfully.');

    } catch (ValidationException $e) {
      // Redirect back with errors and the active tab information
      return redirect()->back()->withErrors($e->errors())->with('active_tab', 'change-password-tab');
    } catch (\Exception $e) {
      // Handle other exceptions
      Log::error($e->getMessage());
      return redirect()->back()->with('error', 'An error occurred while updating the password.');
    }
  }
}
