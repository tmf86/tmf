<?php

namespace Contoller;

class ConnexionController extends Controller
{
    /**
     * @return \View\View
     */
    public function index()
    {
        $title = "Connexion";
        return $this->load_views("pages.connexion", compact("title"));
    }
}