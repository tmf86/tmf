<?php

namespace Contoller;

use Contoller\Http\Request;
use Model\User;
use Repositories\Mailer;
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
            }

            $user = new User();
            $user = $user->create($request->inputs());
            if ($user) {
                $name = sprintf("%s %s", $request->nom, $request->prenom);
                $name_id = sprintf("%s%s", str_replace(" ", '', $request->nom), str_replace(" ", '', $request->prenom));
                $url = buildpath(sprintf('finalize_account_creation/%s/%s', buildUniqueID($user->mat_membre, $user->filiere, $user->contact, $name_id), $request->email));
                $maller = new Mailer($name, $request->email, $url);
                $maller->mail($request);
                $request->session('name', $name);
                $request->session('email', $request->email);
                $request->session('url', $url);
                return $request->ajax(["success" => true, 'redirectTo' => buildpath('registration-success')], 200);
            }
            return $request->ajax(["input_error" => false], 400);

        }
        Request::abort(404);
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