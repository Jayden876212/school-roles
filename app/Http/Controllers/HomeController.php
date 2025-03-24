<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends Controller
{
    protected const PAGE_TITLE = "Home Page";

    private function role() {
        if (! Auth::check()) {
            $role = false;
        } elseif(Auth::user()->student()->get()->first()) {
            $role = "student";
        } elseif(Auth::user()->teacher()->get()->first()) {
            $role = "teacher";
        }

        return $role;
    }

    public function showHome()
    {
        return view("pages.home")->with([
            "page_title" => self::PAGE_TITLE,
            "role" => self::role()
        ]);
    }

    public function handleRedirect()
    {
        return redirect()->route("root");
    }
}
