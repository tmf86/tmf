<?php

namespace Contoller;

use Contoller\Http\Request;
use Model\User;
use Validator\RegisterValidator;
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
            sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
            sprintf("<script  src='%spublic/js/register.js'></script>", rootUrl()),
            sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
        ];
        return new  View("pages.inscription", compact("title", "scripts"));
    }

    /**
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function registerStore(Request $request)
    {
        if ($request->isAjax()) {
            $validator = new RegisterValidator();
            $this->processInputsData();
            $validation = $validator->validateCustermer($request->inputs());
            if ($validation->fails()) {
                $errors = $validation->errors()->firstOfAll();
                $validator->custumErrorMessages($errors);
                $errors['input_error'] = true;
                return $request->ajax($errors, 400);
            } else {
                $user = new User();
                $user = $user->create($request->inputs());
                if ($user) {
                    $name = sprintf("%s %s", $request->nom, $request->prenom);
//                  $maller = new Mailer($name, $request->email);
//                   $maller->mailerSend();
                    debug(buildUniqueID($user->mat_membre));
                    die();
                    return $request->ajax(["success" => true], 200);
                } else {
                    return $request->ajax(["input_error" => false], 400);
                }
//
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