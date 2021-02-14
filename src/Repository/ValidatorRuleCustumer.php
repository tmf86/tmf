<?php


namespace Repository;


use Rakit\Validation\Rule;

abstract class ValidatorRuleCustumer extends Rule implements AjaxCallError
{

    public function abortAjaxError()
    {
        http_response_code(500);
        die();
    }
}