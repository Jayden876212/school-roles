<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected const PAGE_TITLE = "Register";

    public function showRegister()
    {
        return view("pages.register")->with("page_title", self::PAGE_TITLE);
    }

    public function register() 
    {
        return redirect()->route("account.register.show");
    }
}
