<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index()
    {
      if (!Auth::user()->type_id)
      {
        return view('front.user.listing.select-type');
      }

      return view('front.user.listing.new-list');
    }
}
