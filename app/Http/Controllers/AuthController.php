<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $authed = Auth::attempt($request->only("email", "password"));

        if ($authed == false) {
            return $this->sendJsonError(__("worng password"), 401);
        }

        $user = User::query()
            ->where("email", $request->email)
            ->first();

        $token = $user->createToken("api_token")->plainTextToken;
        return $this->sendJsonSuccess($token);
    }
}
