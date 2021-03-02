<?php


namespace Contoller;


use Contoller\Http\Request;
use View\View;

class Controller
{
    /**
     * @var Request
     */
    protected $request;


    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

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