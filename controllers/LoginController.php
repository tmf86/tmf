<?php

namespace Contoller;

use View\View;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $title = "Connexion";
        return $this->load_views("pages.login", compact("title"));
    }
}