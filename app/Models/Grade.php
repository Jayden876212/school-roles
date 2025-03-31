<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grades";
    public $timestamps = false;

    // Use non-integer primary string for readability and simplicity (varchar)
    protected $primaryKey = "grade";
    public $incrementing = false;
    protected $keyType = "string";

    public static function getGrade(string $grade): Grade
    {
        $grade_instance = self::where("grade", "=", $grade)->sole();

        return $grade_instance;
    }
}
