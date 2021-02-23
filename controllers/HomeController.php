<?php


namespace Contoller;


use Model\Annonce;
use View\View;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Acceuil";
        $scripts = ["<script  src='public/js/script.js'></script>"];
        $annonce = new Annonce();
        $annonce = $annonce->all('ORDER BY (date_ann) DESC');
        $i = count($annonce);
        return new  View("pages.acceuil", compact("title", "annonce", "i", "scripts"));
    }


}