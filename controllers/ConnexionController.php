<?php

namespace Contoller;

class ConnexionController extends Controller
{
    /**
     * @return \View\View
     */
    public function index()
    {
        return $this->load_views("pages.connexion");
    }
}