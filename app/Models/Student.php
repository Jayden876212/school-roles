<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;

    protected $fillable = [
        "username"
    ];

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class)->orderBy("month", "ASC");
    }

    public function getExams(): Collection
    {
        return $this->exams()->get();
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "username", "username");
    }

    public function getUser(): User
    {
        return $this->user()->sole();
    }
}
