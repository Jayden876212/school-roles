<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected const PAGE_TITLE = "Home Page";

    public function showHome()
    {
        return view("pages.home")->with("page_title", self::PAGE_TITLE);
    }

    public function handleRedirect()
    {
        return redirect()->route("root");
    }
}
