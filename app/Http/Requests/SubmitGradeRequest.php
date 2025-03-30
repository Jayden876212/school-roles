<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class SubmitGradeRequest extends FormRequest
{
    private $user;

    public function __construct(Guard $guard)
    {
        $this->user = $guard->user();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user->role("student");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
