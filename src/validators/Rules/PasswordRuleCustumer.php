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
        $account = $account->query(sprintf("select * from compte where mot_pass='%s'", password_hash($value, PASSWORD_BCRYPT, ['cost' => 12])));
        if ($account) {
            $bool = true;
        }
        return $bool;
    }
}