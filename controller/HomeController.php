<?php


namespace Contoller;


use View\View;

class HomeController extends Controller
{
    public function index(){
        $title = "Acceuil";
        return new  View("pages.acceuil",compact("title"));
    }

}