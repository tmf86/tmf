<?php


namespace Interfaces;


interface AjaxCallError
{
    /**
     * @param int $code
     * @param bool $break
     * @return void
     */
    public function abortAjaxError(int $code, bool $break = false);
}