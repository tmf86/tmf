<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use View\View;

class Logout extends Controller
{
    use AuthMiddleware;

    /**
     * @return View
     */
    public function logout(): View
    {
        return $this->makelogout(true);
    }
}