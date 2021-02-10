<?php


namespace Contollers;


use Views\View;

class Controller 
{


    protected function load_views(string $view, array $vars = [])
    {
        return new View($view, $vars);
    }

}