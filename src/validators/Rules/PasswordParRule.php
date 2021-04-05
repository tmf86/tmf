<?php


namespace Validator\Rules;


use Model\Demand_Acount;
use Rakit\Validation\Rule;

class PasswordParRule extends Rule
{

    private function VerifInfo($value):bool{
        $bool = false;
        $cmpt_d = new Demand_Acount();
        $cmpt_d = $cmpt_d->select("compte_demande")->whereEqual("mdp_cmpt",$value)->run();
        if ($cmpt_d){
            $bool = true;
        }
        return $bool;
    }

    public function check($value): bool{

        // TODO: Implement check() method.
    }
}