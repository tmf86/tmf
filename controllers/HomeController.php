<?php


namespace Contoller;


use Contoller\middleware\Auth;
use Model\Annonce;
use Model\User;
use View\View;

class HomeController extends Controller
{
    use Auth;

    /**
     * @return View
     * @throws \Exception
     */
    public function index()
    {
        $title = "Acceuil";
        $scripts = ["<script  src='public/js/script.js'></script>"];
        $annonce = new Annonce();
        $annonce = $annonce->all('ORDER BY (date_ann) DESC');
        $i = count($annonce);
        $user_image = $this->getUserImage();
        return new  View("pages.home", compact("title", "annonce", "i", "scripts", 'user_image'));
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getUserImage(): string
    {
        $user_image = 'images/user-default.jpg';
        if ($this->isAuth()) {
            $user = new User();
            $user = $user->find($this->request->session('user_id'));
            $user_image = $user->image;
        }
        return $user_image;
    }


}