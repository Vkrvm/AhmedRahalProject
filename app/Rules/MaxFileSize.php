<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxFileSize implements ValidationRule
{
    protected $maxSize;

    public function __construct($maxSize = 10240) // 10MB in KB
    {
        $this->maxSize = $maxSize;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value && $value->getSize() > ($this->maxSize * 1024)) {
            $fail("The {$attribute} must not be greater than {$this->maxSize}KB.");
        }
    }
}
