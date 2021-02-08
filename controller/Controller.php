<?php


namespace Contoller;


use View\View;

class Controller 
{


    protected function load_views(string $view, array $vars = [])
    {
        return new View($view, $vars);
    }

}