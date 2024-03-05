<?php

namespace App\Http\Controllers\authentications;

use App\Mail\VerifyEmail;
use App\Mail\ForgotEmail;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use ReCaptcha\ReCaptcha;
use DB;
use Carbon\Carbon;

class LoginBasic extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        $pageConfigs = ["myLayout" => "blank"];
        return view("content.authentications.auth-login-basic", [
            "pageConfigs" => $pageConfigs,
        ]);
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect("home");
        }

        $token = $request->has("token") ? $request->all()["token"] : null;
        $user = null;

        if ($token) {
            $user = User::query()
                ->where("claim_token", $token)
                ->first();

            if (!$user) {
                return abort(401);
            }
        }

        $pageConfigs = ["myLayout" => "blank"];
        return view(
            "front.user.auth_register",
            compact("user", "token", "pageConfigs")
        );
    }

    public function forgotPassword()
    {
        if (Auth::check()) {
            return redirect("home");
        }

        $pageConfigs = ["myLayout" => "blank"];
        return view("front.user.forgot", compact("pageConfigs"));
    }

    public function forgotEmail(Request $request)
    {
        $request->validate(
            [
                "email" => ["required", "email"],
            ],
            [
                "email.required" => "Email address is required",
                "email.email" => "Email address is not valid",
            ]
        );
        $user = User::where("email", $request->email)->first();
        if ($user) {
            $token = Str::random(64);
            DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

            Mail::to($request->email)->send(new ForgotEmail($user, $token));
            return redirect()
                ->back()
                ->with([
                    "success" =>
                        "Reset password instruction sent to your email.",
                ]);
        }
        return redirect()
            ->back()
            ->with([
                "error" =>
                    "Your email address is not registered. Please sign up.",
            ]);
    }

    public function showResetForm($token = null){
        if (empty($token)) {
            abort(404);
        }
        $pageConfigs = ["myLayout" => "blank"];
        return view('front.user.reset-password', ['token' => $token,'pageConfigs'=>$pageConfigs]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where(['token' => $request->token])->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
        return redirect('/login')->with('success', 'Your password has been changed!');

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "first_name" => ["required", "string", "max:255"],
                "last_name" => ["required", "string", "max:255"],
                "email" => [
                    "required",
                    "string",
                    "email",
                    "max:255" /*, 'unique:users'*/,
                ],
                "password" => ["required", "string", "confirmed"],
                "g-recaptcha-response" => "required",
            ],
            [
                "g-recaptcha-response" => "Recaptcha is required",
            ]
        );

        $recaptcha = new Recaptcha(config("services.google_recaptcha.recaptcha_site_secret"));
        // Verify reCAPTCHA response
        $response = $recaptcha->verify($request->input("g-recaptcha-response"));

        if (!$response->isSuccess()) {
            return redirect()
                ->back()
                ->with(["error" => "Invalid captcha!"]);
        }

        if (!$request->all()["user_id"]) {
            if (
                User::query()
                    ->where("email", $request->all()["email"])
                    ->exists()
            ) {
                return redirect()
                    ->back()
                    ->with(["error" => "Email already in use!"]);
            }

            $user = new User();
            $user->name =
                $request->all()["first_name"] .
                " " .
                $request->all()["last_name"];
            $user->email = $request->all()["email"];
            $user->password = Hash::make($request->all()["password"]);
            //$user->email_verification_token = Str::random(30); // Generate a random token
            $user->save();
            $user->assignRole("vendor");

            /*Direct Login Temporary*/
            $user->update([
                "claim_token" => null,
                "email_verified_at" => now(),
            ]);
            Auth::loginUsingId($user->id);
            return to_route("home");
            /*Direct Login Temporary*/

            // Trigger a verify mail to the vendor
            /*Mail::to($user->email)->send(new VerifyEmail($user));

            return redirect()
                ->back()
                ->with(["success" => "Sign up successfully, Check your email"]);*/
        }

        $user = User::query()
            ->where("id", $request->all()["user_id"])
            ->first();

        if (!$user) {
            return abort(401);
        }

        $user->update([
            "password" => Hash::make($request->all()["password"]),
            "claim_token" => null,
        ]);

        Auth::loginUsingId($user->id);

        return to_route("home");
    }

    public function verify(Request $request, $token)
    {
        $user = User::query()
            ->where("email_verification_token", $token)
            ->first();

        if (!$user) {
            // Token not found
            abort(404);
        }

        // Verify the user's email
        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        // Redirect to the login page or any other page
        return to_route('login');
    }

    public function selectType()
    {
        if (Auth::check() && !Auth::user()->type_id) {
            $types = Type::query()->get();

            $pageConfigs = ["myLayout" => "blank"];
            return view(
                "front.user.listing.select-type",
                compact("pageConfigs", "types")
            );
        }

        abort(401);
    }

    public function saveType(Request $request)
    {
        if (!$request->has("type_id")) {
            return abort(401);
        }

        if (Auth::check()) {
            Auth::user()->update([
                "type_id" => $request->all()["type_id"],
            ]);

            return to_route("user_listing");
        }

        return abort(401);
    }

    public function vendorLogin(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "password" => "required|string",
            "g-recaptcha-response" => "required",
        ]);

        $recaptcha = new Recaptcha(config("services.google_recaptcha.recaptcha_site_secret"));
        // Verify reCAPTCHA response
        $response = $recaptcha->verify($request->input("g-recaptcha-response"));

        if (!$response->isSuccess()) {
            return redirect()
                ->back()
                ->with(["error" => "Invalid captcha!"]);
        }

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verification_token == null) {
                /*if (! Auth::user()->type_id) {
          return to_route('select_type');
        }*/

                return to_route("profile.index");
            }

            Auth::logout();
            return redirect()
                ->back()
                ->with(["error" => "Please verify your email!"]);
        }

        // Authentication failed
        return back()->withErrors(["email" => "Invalid credentials!"]);
    }
}
