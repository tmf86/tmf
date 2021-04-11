<?php


namespace Contoller\Middleware\TaskBeforeRequest;


use View\View;

interface BeforeRequestInterface
{
    /**
     * @param mixed ...$data
     * @return mixed|View
     */
    public function doTask(...$data);
}