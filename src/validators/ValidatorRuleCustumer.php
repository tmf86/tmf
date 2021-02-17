<?php


namespace Validator;


use Interfaces\AjaxCallError;
use Rakit\Validation\Rule;

abstract class ValidatorRuleCustumer extends Rule implements AjaxCallError
{
    /**
     * @param int $code
     * @param bool $break
     */
    public function abortAjaxError(int $code, bool $break = false)
    {
        // TODO: Implement abortAjaxError() method.
        http_response_code($code);
        if ($break) die();
    }
}