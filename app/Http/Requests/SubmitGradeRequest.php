<?php

namespace App\Http\Requests;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $student_id = $this->user->getStudent()->id;
        return [
            "month" => [
                "required",
                "date_format:Y-m-d",
                Rule::unique("exams", "month")->where("student_id", $student_id)],
            "grade" => ["required", "exists:App\Models\Grade"]
        ];
    }

    protected function prepareForValidation(): void
    {
        $month = Carbon::parse($this->input("month"));

        $this->merge([
            "month" => Exam::sanitiseMonthForDatabase($month)
        ]);
    }
}
