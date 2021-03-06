<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Model\User;
use View\View;

abstract class Controller
{

    use AuthMiddleware;

    /**
     * @var Request
     */
    protected Request $request;


    /**
     * Controller constructor.
     * @param $request
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

    /**
     * @return string
     * @throws \Exception
     */
    protected function getUserImage(): string
    {
        $user_image = 'images/user-default.jpg';
        if ($this->isAuth()) {
            $user = new User();
            $user = $user->find($this->request->session('user_id'));
            $user_image = $user->image ?? 'images/user-default.jpg';
        }
        return $user_image;
    }


}