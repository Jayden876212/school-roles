<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = "users";
    public $timestamps = false;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        "username",
        "password",
        "first_name",
        "last_name"

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        "password",
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "password" => "hashed",
        ];
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, "username", "username");
    }

    public function getStudent(): Student
    {
        return $this->student()->sole();
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, "username", "username");
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher()->sole();
    }

    public function role(string $role_name): bool {
        $role = $this->$role_name()->exists();

        return (bool) $role;
    }
}