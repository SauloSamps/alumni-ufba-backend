<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUserUFBARule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->checkUserUFBA($value))
        {
            $fail('Aluno não encontrado no sistema da UFBA');
        }
    }

    public function checkUserUFBA()
    {
        return true;
    }
}
