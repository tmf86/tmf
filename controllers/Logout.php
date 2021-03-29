<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use View\View;

class Logout extends Controller
{
    use Auth;

    /**
     * @return View
     */
    public function logout(): View
    {
        return $this->logoutProcess();
    }
}