<?php


namespace Validator;


use Interfaces\AjaxCallError;
use Rakit\Validation\Rule;

abstract class ValidatorRuleCustumer extends Rule implements AjaxCallError
{

    public function abortAjaxError($code)
    {
        http_response_code($code);
    }
}