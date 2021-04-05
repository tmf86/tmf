<?php


namespace Validator\Rules;


use Model\Demand_Acount;
use Rakit\Validation\Rule;

class LogParRuleCustumer extends Rule
{
    protected $message = " :attribute Incorrect";
    private function VerifInfo($value):bool{
        $bool = false;
        $cmpt_d = new Demand_Acount();
        $cmpt_d = $cmpt_d->select("compte_demande")->whereEqual("identifiant",$value)->run();
        if ($cmpt_d){
            $bool = true;
        }
        return $bool;
    }

    public function check($value): bool
    {
        return $this->VerifInfo($value);
        // TODO: Implement check() method.
    }
}