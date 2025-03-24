<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected const PAGE_TITLE = "Register";

    public function showRegister()
    {
        return view("pages.register")->with("page_title", self::PAGE_TITLE);
    }

    public function register(RegisterRequest $request) 
    {
        $created_user = User::create([
            "username" => $request->username,
            "password" => $request->password,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name
        ]);

        if ($created_user) {
            switch ($request->role) {
                case "student":
                    Student::create(["username" => $created_user->username]);
                    break;
                case "teacher":
                    Teacher::create(["username" => $created_user->username]);
                    break;
            }
        } else {
            $created_user->delete();
        }

        return redirect()->route("account.register.show");
    }
}
