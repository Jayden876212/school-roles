<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Schema;

class RoleExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! Schema::hasTable($value . "s")) { // Add "s" to the end of the role to get the table name
            $fail("The :attribute ('$value') does not exist.");
        }
    }
}
