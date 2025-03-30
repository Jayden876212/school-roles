<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    private $user;

    public function __construct(Guard $auth)
    {
        $this->user = $auth->user();
    }

    public function showGrades(): View
    {
        $grades = Grade::all();

        return view("pages.grades", [
            "user" => $this->user,
            "grades" => $grades
        ])->with("page_title", "Grades");
    }
}
