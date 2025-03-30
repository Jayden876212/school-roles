<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Student;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    protected const PAGE_TITLE = "Login";
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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

        $logged_in_successfully = $this->auth->attempt($credentials);
        if (! $logged_in_successfully) {
            return redirect()->back()->withErrors(["authentication" => "Failed to log you into your account (credentials do not match)."]);
        }

        return redirect()->route("home")->with("success", "Successfully logged you into your account.");
    }

    public function logout(): RedirectResponse
    {
        $this->auth->logout();

        return redirect()->route("home")->with("success", "Successfully logged you out of your account.");
    }

    public function handleRedirect(): RedirectResponse
    {
        return redirect()->route("login.show");
    }
}
