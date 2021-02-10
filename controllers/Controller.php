<?php


namespace Contoller;


use View\View;

class Controller
{

    /**
     * @param string $view
     * @param array $vars
     * @return View
     */
    protected function load_views(string $view, array $vars = [])
    {
        return new View($view, $vars);
    }

}