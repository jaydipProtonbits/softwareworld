<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
      if (Auth::check())
      {
        return to_route('profile.index');
      }

      $pageConfigs = ['myLayout' => 'blank'];
      return view('front.user.auth-login', ['pageConfigs' => $pageConfigs]);
    }

    public function login() {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('front.user.login', compact('pageConfigs'));

      return view('auth.auth-login-cover');
    }

    public function dashboard() {
      $countries = Country::query()->get();
      return view('front.user.profile', compact('countries'));
    }
}
