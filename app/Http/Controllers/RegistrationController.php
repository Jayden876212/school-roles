<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected const PAGE_TITLE = "Register";
    
    private $auth;
    private $users;
    private $student;
    private $teacher;

    public function __construct(Guard $auth, User $users, Student $student, Teacher $teacher)
    {
        $this->auth = $auth;
        $this->users = $users;
        $this->student = $student;
        $this->teacher = $teacher;
    }

    public function showRegister(): View
    {
        return view("pages.register")->with("page_title", self::PAGE_TITLE);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $created_user = $this->users::create([
            "username" => $request->username,
            "password" => $request->password,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name
        ]);

        if (!$created_user) {
            $created_user->delete();

            return redirect()->route("login.show")->with("error", "Failed to create user.");
        }

        $role = $request->role;
        $created_role = $this->$role::create(["username" => $created_user->username]);
        if (!$created_role) {
            $created_user->delete();

            return redirect()->route("login.show")->with("error", "Failed to create role.");
        }

        return redirect()->route("login.show");
    }
}
