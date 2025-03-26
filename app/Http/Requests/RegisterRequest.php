<?php

namespace App\Http\Requests;

use App\Rules\RoleExists;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    private $auth;
    private $roleExists;

    public function __construct(Guard $auth, RoleExists $roleExists)
    {
        $this->auth = $auth;
        $this->roleExists = $roleExists;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !($this->auth->check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => ["required", "max:20", "unique:App\Models\User"],
            "password" => ["required", "max:255"],
            "confirm_password" => ["required", "same:password"],
            "first_name" => ["required", "max:255"],
            "last_name" => ["required", "max:255"],
            "role" => ["required", $this->roleExists]
        ];
    }
}
