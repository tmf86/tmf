<?php


namespace Validator\Rules;

use Model\Account;
use Model\User;
use Rakit\Validation\Rule;

class EmailOrIDRuleCustumer extends Rule
{
    protected $message = "The :attribute is not an email or ID associed with an account";

    /**
     * @param $value
     * @return bool
     */
    private function dataCheck($value): bool
    {
        $user = new User();
        $account = new Account();
        $bool = false;
        $user = $user->query(sprintf("select * from membre where email='%s'", $value));
        $account = $account->query(sprintf("select * from compte where identifiant='%s'", $value));
        if ($account || $user) {
            $bool = true;
        }
        return $bool;
    }

    /**
     * @param $value
     * @return bool
     */
    public function check($value): bool
    {
        // TODO: Implement check() method.
        return $this->dataCheck($value);
    }
}