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
        $scripts = [
            sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
            sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
        ];
        return $this->load_views("pages.login", compact("title", 'scripts'));
    }
}