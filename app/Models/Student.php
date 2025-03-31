<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;

    protected $fillable = [
        "username"
    ];

    public function exams(): Collection
    {
        return $this->hasMany(Exam::class)->orderBy("month", "ASC")->get();
    }
}
