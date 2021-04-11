<?php


namespace Contoller;


use Contoller\Middleware\AuthMiddleware;
use Model\Annonce;
use View\View;

class HomeController extends Controller
{
    use AuthMiddleware;

    /**
     * @return View
     * @throws \Exception
     */
    public function index()
    {
        $title = "Acceuil";
        $scripts = ["<script  src='public/js/script.js'></script>"];
        $annonce = new Annonce();
        $annonce = $annonce->select('annonce')->orderByDesc('date_ann')->run(true);
        $i = count($annonce);
        $user_image = $this->getUserImage();
        return new  View("pages.home", compact("title", "annonce", "i", "scripts", 'user_image'));
    }


}