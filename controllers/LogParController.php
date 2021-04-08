<?php


namespace Contoller;


use Contoller\Http\Request;
use Validator\LogParValidator;
use View\View;

class LogParController extends Controller
{
    /**
     * @return View
     */
    public function parrainage()
    {
        $title = "Acceder au Parrainage";
        return $this->load_views('pages.parrainage', compact("title"), false);
    }

    /**
     * @return View
     */
    public function loging()
    {
        $vld = new LogParValidator();
        $title = "Acceder au Parrainage";
        $vld = $vld->validateCustermer($this->request->inputs());
        if ($vld->fails()) {
            $erreurs = $vld->errors()->firstOfAll();
            Request::setErrors($erreurs);
            return new View("pages.parrainage", compact("title",), false);
        }
        $title = "Tableau de Bord";
        return $this->load_views('pages.dashbord_par', compact("title"));

    }
}