<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = "exams";
    public $timestamps = false;

    protected $fillable = [
        "student_id",
        "grade",
        "month"
    ];

    public static function submitExamGrade(string $month, Grade $grade, Student $student): Exam
    {
        $exam_grade_submission = new Exam();

        $exam_grade_submission->month = Carbon::parse($month)->format("Y-m-d");
        $exam_grade_submission->grade = $grade->grade;
        $exam_grade_submission->student_id = $student->id;

        $exam_grade_submission->save();

        return $exam_grade_submission;
    }
}
