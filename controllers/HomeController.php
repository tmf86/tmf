<?php


namespace Contollers;


use Views\View;

class HomeController extends Controller
{
    public function index(){
        $title = "Acceuil";
        return new  View("pages.acceuil",compact("title"));
    }

}