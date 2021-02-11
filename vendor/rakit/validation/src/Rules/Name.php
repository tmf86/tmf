<?php


namespace Rakit\Validation\Rules;


use Rakit\Validation\Rule;

class Name extends Rule
{
    /** @var string */
    protected $message = "The :attribute must be a name valide";

    /**
     * Check the value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        $fistChar = $value[0] ?? "";
        $lastChar = $value[strlen($value) - 1] ?? "";
        $testpos = true;
        if ($fistChar === "-" || $fistChar === "'" || $fistChar === " ") {
            $testpos = false;
        } elseif ($lastChar === "-" || $lastChar === "'" || $lastChar === " ") {
            $testpos = false;
        }
        return ($testpos) ? preg_match("#^[A-Za-zéê èûôîï\-']+$#", $value) : $testpos;
    }
}
