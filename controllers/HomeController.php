<?php


namespace Contoller;


use Contoller\Http\Request;
use Contoller\middleware\Auth;
use Model\Annonce;
use View\View;

class HomeController extends Controller
{
    use Auth;

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

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