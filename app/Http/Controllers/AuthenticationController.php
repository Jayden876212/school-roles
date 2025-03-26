<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Student;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    protected const PAGE_TITLE = "Login";

    public function showLogin(): View
    {
        return view("pages.login")->with("page_title", self::PAGE_TITLE);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            "username" => $request->username,
            "password" => $request->password
        ];

        Auth::attempt($credentials);

        return redirect()->route("account.login.show");
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route("home");
    }
}
