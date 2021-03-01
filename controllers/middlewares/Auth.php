<?php


namespace Contoller\middleware;


use Contoller\Http\Request;

trait Auth
{
    public function __construct()
    {
        debug(true, $this->isAuth());
    }

    public function isAuth()
    {
        return new Request();
    }
}