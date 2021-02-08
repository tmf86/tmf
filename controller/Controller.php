<?php


namespace Contoller;


use View\View;

class Controller implements Request\Request
{

    public function __construct()
    {
        $this->postRequest();
    }

    protected function load_views(string $view, array $vars = [])
    {
        return new View($view, $vars);
    }

    public function postRequest()
    {
        // TODO: Implement postRequest() method.
    }
}