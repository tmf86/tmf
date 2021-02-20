<?php


namespace Contoller;


use Model\Annonce;
use View\View;

class HomeController extends Controller
{
    public function index(){
        $title = "Acceuil";
        $ann = new Annonce();
        $i=0;
        $annonce = $ann->index();
        foreach ($annonce as $a){
            $i++;
        }
            return new  View("pages.acceuil",compact("title","annonce","i"));
    }


}