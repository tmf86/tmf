<?php

namespace Contollers;

class ConnexionController extends Controller
{
    /**
     * @return \Views\View
     */
    public function index()
    {
        return $this->load_views("pages.connexion");
    }
}