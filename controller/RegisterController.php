<?php

namespace Contoller;

use Repository\RegiserRepositoryValidator;
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

    public function registerStore()
    {
        if (is_ajax()) {
            $validator = new RegiserRepositoryValidator();
            $validation = $validator->validateCustermer(post());
            if ($validation->fails()) {
                $errors = $validation->errors()->firstOfAll();
                $validator->processFailed($errors);
                print_r($errors);
            } else {
                // validation passes
                echo "Success!";
            }

        } else {
            abort(404);
        }
    }

    private function validate()
    {

    }

}