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

    public static function sanitiseMonthForDatabase(Carbon $month): string
    {
        $sanitised_month = Carbon::parse($month->format("Y-m"))->format("Y-m-d");

        return $sanitised_month;
    }

    public static function submitExamGrade(Carbon $month, Grade $grade, Student $student): Exam
    {
        $exam_grade_submission = new Exam();

        $exam_grade_submission->month = self::sanitiseMonthForDatabase($month);
        $exam_grade_submission->grade = $grade->grade;
        $exam_grade_submission->student_id = $student->id;

        $exam_grade_submission->save();

        return $exam_grade_submission;
    }
}
