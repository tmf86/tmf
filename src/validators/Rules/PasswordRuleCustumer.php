<?php


namespace Validator\Rules;


use Model\Account;
use Rakit\Validation\Rule;

class PasswordRuleCustumer extends Rule
{
    protected $message = "The :attribute is not associed with no account";

    /**
     * @param $value
     * @return bool
     */
    public function check($value): bool
    {
        // TODO: Implement check() method.
        $account = new Account();
        $bool = false;
        $accounts = $account->all();
        foreach ($accounts as $account) {
            $bool = password_verify($value, $account->mot_pass);
            if ($bool) {
                break;
            }
        }
        return $bool;
    }
}