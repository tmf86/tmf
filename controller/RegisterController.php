<?php

namespace Contoller;

use Contoller\HttpRequest\Request;
use View\View;

class RegisterController extends Controller
{

    /**
     * @return \View\View
     */
    public function index()
    {
        $title = "Inscription";
        $scripts = [
            "<script  src='public/js/register.js'></script>",
            "<script  src='public/js/script.js'></script>"
        ];
        return new  View("pages.inscription", compact("title", "scripts"));
    }

    public function registerStore(Request $request)
    {
        $this->processInputsData();
        var_dump($request->inputs());
        die();
        // if (is_ajax()) {
        //     $validator = new RegiserRepositoryValidator();
        //     $validation = $validator->validateCustermer(post());
        //     if ($validation->fails()) {
        //         $errors = $validation->errors()->firstOfAll();
        //         $validator->custumErrorMessages($errors);

        //     } else {
        //         // validation passes
        //         debug(post());
        //         echo "Success!";
        //     }

        // } else {
        //     abort(404);
        // }
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