<?php

namespace Contoller;

use Contoller\Http\Request;
use Repository\Mailer;
use Repository\RegiserRepositoryValidator;
use View\View;

class RegisterController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        $title = "Inscription";
        $scripts = [
            "<script  src='public/js/functions.js'></script>",
            "<script  src='public/js/register.js'></script>",
            "<script  src='public/js/script.js'></script>"
        ];
        return new  View("pages.inscription", compact("title", "scripts"));
    }

    /**
     * @param Request $request
     * @return Request
     */
    public function registerStore(Request $request)
    {
        $request->sleepRequest(1);
        if ($request->isAjax()) {
            $validator = new RegiserRepositoryValidator();
            $this->processInputsData();
            $validation = $validator->validateCustermer($request->inputs());
            if ($validation->fails()) {
                $errors = $validation->errors()->firstOfAll();
                $validator->custumErrorMessages($errors);
                return $request->ajax($errors, 400);
            } else {
                $name = sprintf("%s %s", $request->nom, $request->prenom);
                $maller = new Mailer($name, $request->email);
                $maller->mailerSend();
                return $request->ajax(["success" => true], 200);
            }

        } else {
            Request::abort(404);
        }
        return $request;
    }

    /**
     * @return void
     */
    private function processInputsData()
    {
        if (isset($_POST["annee"], $_POST["mois"], $_POST["jour"])) {
            $_POST["date_naissance"] = sprintf("%s-%s-%s", $_POST["annee"], $_POST["mois"], $_POST["jour"]);
            unset($_POST["jour"], $_POST["annee"], $_POST["mois"]);
        }
    }

}