<?php


namespace Contoller;


use Model\Annonce;
use View\View;

class HomeController extends Controller
{
    public function index(){
        $title = "Acceuil";
        $scripts=["<script  src='public/js/script.js'></script>"];
        $ann = new Annonce();
        $i=0;
        $annonce = $ann->all('ORDER BY (date_ann) DESC');
        foreach ($annonce as $a){
            $i++;
        }
            return new  View("pages.acceuil",compact("title","annonce","i","scripts"));
    }


}