<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request1;
use App\Http\Requests\Request2;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormActionController extends Controller
{
    public function showPage(): View
    {
        return view("pages.form-view")->with("page_title", "FormAction Testing");
    }

    public function handleRequest1(Request1 $request): RedirectResponse
    {
        return redirect()->route("form")->with("success", "Request 1 is valid");
    }

    public function handleRequest2(Request2 $request): RedirectResponse
    {
        return redirect()->route("form")->with("success", "Request 2 is valid");
    }
}
