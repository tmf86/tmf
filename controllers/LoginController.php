<?php

namespace Contoller;

use Contoller\middleware\Auth;
use Model\Account;
use Model\Comment;
use Model\User;
use Validator\LoginValidator;
use View\View;

class LoginController extends Controller
{
    use Auth;

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
        $this->request->sleepRequest(2);
        $validator = new LoginValidator();
        $validation = $validator->validateCustermer($this->request->inputs());
        if ($validation->fails()) {
            $errors = $validation->errors->firstOfAll();
            return $this->request->ajax($errors, 400);
        }
        $is_email_adresse = filter_var($this->request->email_ou_identifiant, FILTER_VALIDATE_EMAIL);
        $sucess_data = [];
        switch ($is_email_adresse) {
            case $this->request->email_ou_identifiant:
                $user = new User();
                $user = $user->query(sprintf("select * from membre where email='%s'", $this->request->email_ou_identifiant));
                $this->request->session('user_id', $user->mat_membre);
                $this->request->session('token', $this->generateToken());
                $sucess_data = ['success' => true, 'redirecTo' => buildpath('profile'), 'username' => $user->prenom];
                break;
            case false :
                $account = new Account();
                $account = $account->query(sprintf("select * from compte where identifiant='%s'", $this->request->email_ou_identifiant));
                $user = $account->user();
                $this->request->session('user_id', $user->mat_membre);
                $this->request->session('token', $this->generateToken());
                $sucess_data = ['success' => true, 'redirecTo' => buildpath('profile'), 'username' => $user->prenom];

        }
        return $this->request->ajax($sucess_data, 200);
    }
}