<?php


namespace Contoller;


use View\View;

class Controller
{

    /**
     * @param string $view
     * @param array $vars
     * @param bool $use_templating
     * @return View
     */
    protected function load_views(string $view, array $vars = [], bool $use_templating = true)
    {
        return new View($view, $vars, $use_templating);
    }

}