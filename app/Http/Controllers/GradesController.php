<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitGradeRequest;
use App\Models\Exam;
use App\Models\Grade;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

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

    public function submitGrade(SubmitGradeRequest $request): RedirectResponse
    {
        $month = $request->month;

        try {
            $student = $this->user->student()->sole();
        } catch (Throwable $caught) {
            return redirect()->back()->withErrors(["database" => "Failed to obtain student for assigning exam to (database error)"]);
        }

        try {
            $grade = Grade::where("grade", "=", $request->grade)->sole();
        } catch (Throwable $caught) {
            return redirect()->back()->withErrors(["database" => "Failed to obtain grade for assigning to exam (database error)"]);
        }

        try {
            $exam_grade_submission = Exam::submitExamGrade($month, $grade, $student);
        } catch (Throwable $caught) {
            return redirect()->back()->withErrors(["database" => "Failed to submit exam grade (database error)"]);
        }

        return redirect()->back()->with("success", "Successfully submitted exam grade.");
    }
}
