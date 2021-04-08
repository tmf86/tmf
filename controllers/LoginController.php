<?php

namespace Contoller;

use Contoller\Http\Request;
use Contoller\Middleware\Auth;
use Model\Account;
use Model\Comment;
use Model\User;
use Validator\LoginValidator;
use View\View;

class LoginController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->authenticated();
    }

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
                $user = $user
                    ->select('membre')
                    ->whereEqual('email', $this->request->email_ou_identifiant)
                    ->limit('1')
                    ->run();
                $sucess_data = ['success' => true, 'redirectTo' => $this->redirectTo(), 'username' => $user->prenom];
                break;
            case false :
                $account = new Account();
                $account = $account
                    ->select('compte')
                    ->whereEqual('identifiant', $this->request->email_ou_identifiant)
                    ->limit('1')
                    ->run();
                $user = $account->user();
                $this->request->session('user_id', $user->mat_membre);
                $this->request->session('token', $this->generateToken());
                $sucess_data = ['success' => true, 'redirectTo' => $this->redirectTo(), 'username' => $user->prenom];

        }
        return $this->request->ajax($sucess_data, 200);
    }

    private function redirectTo()
    {
        if ($this->request->hasGetKey('origin')) {
            return makeRootOrFileUrl($this->request->origin);
        }
        return makeRootOrFileUrl('profile');
    }

    /**
     * @param User $user
     * @return void
     * @throws \Exception
     */
    private function setSession(User $user)
    {
        $this->request->session('user_id', $user->mat_membre);
        $this->request->session('token', $this->generateToken());
    }
}