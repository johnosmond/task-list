<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TodayOrFutureDate implements ValidationRule
{
    protected $attributeLabel;

    public function __construct($attributeLabel = null)
    {
        $this->attributeLabel = $attributeLabel;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $label = $this->attributeLabel ?: $attribute;
        if (strtotime($value) < strtotime('today')) {
            $fail("{$label} must be a date of today or after.");
        }
    }
}
