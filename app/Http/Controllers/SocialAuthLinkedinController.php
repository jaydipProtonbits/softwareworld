<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthLinkedinController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('linkedin-openid')->redirect();
    }

    public function callback()
    {
        try {
            $linkdinUser = Socialite::driver('linkedin-openid')->user();

            $existUser = User::query()
              ->where('email',$linkdinUser->email)
              ->first();

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->name = $linkdinUser->name;
                $user->email = $linkdinUser->email;
                $user->linkedin_id = $linkdinUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
                //$user->assignRole('vendor');
                $user->assignRole('reviewer');
            }
            return to_route('review_home');
        }
        catch (Exception $e) {
            dd($e);
        }
    }

}
