<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    protected const PAGE_TITLE = "Login";

    public function showLogin()
    {
        return view("pages.login")->with("page_title", self::PAGE_TITLE);
    }

    public function login()
    {
        return redirect()->route("account.login.show");
    }
}
