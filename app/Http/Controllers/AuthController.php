<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Seshac\Otp\Otp;

class AuthController extends Controller
{
    public function apiLoginRequestOTP(string $countryCode, string $phone)
    {
        $fullPhone = formatPhone($countryCode, $phone);
        $otp = Otp::generate($fullPhone);
        return $this->sendJsonSuccess($otp);
    }

    public function apiLoginVerifyOTP(Request $request, string $countryCode, string $phone)
    {
        $otpToken = $request->get("otp");
        if($otpToken == null){
            return $this->sendJsonError("No otp provided" , 401);
        }
        $fullPhone = formatPhone($countryCode, $phone);

        $authenticatedResult = Otp::validate($fullPhone ,$otpToken);

        if($authenticatedResult->status === false){
            return $this->sendJsonError($authenticatedResult->message , 401);
        }

        $user = User::query()
            ->where("country_code", $countryCode)
            ->where("phone_number", Str::replaceStart("0", "", $phone))
            ->where("login_method", "phone")
            ->firstOrCreate(["name" => "anonymous"]);

        $token = $user->createToken("api_token")->plainTextToken;
        return $this->sendJsonSuccess($token);
    }

    function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if ($credentials["email"] == "demo") {
            abort_unless(app()->isLocal(), 403);
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/home');
        }

        flash(__("auth.failed"))->error();

        return back()->withInput();
    }


    function demoLogin()
    {
        abort_unless(app()->isLocal(), 403);

        $user = User::where('email', 'demo')->first();
        if ($user) {
            Auth::login($user);
            return redirect()->intended('/admin/home');
        }

        $this->error("all.no_demo_user");

        return back();
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
