<?php

namespace Contoller;

use Validator\LoginValidator;
use View\View;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $title = "Connexion";
        $user_image = $this->getUserImage();
        $scripts = [
            sprintf("<script  src='%spublic/js/functions.js'></script>", rootUrl()),
            sprintf("<script  src='%spublic/js/script.js'></script>", rootUrl())
        ];
        return $this->load_views("pages.login", compact("title", 'scripts', 'user_image'));
    }

    public function postLogin()
    {
        $validator = new LoginValidator();
        $validation = $validator->validateCustermer($this->request->inputs());
        $errors = [];
        if ($validation->fails()) {
            $errors = $validation->errors->firstOfAll();
            return $this->request->ajax($errors, 400);
        }
    }
}