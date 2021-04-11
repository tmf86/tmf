<?php

namespace Contoller;

use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;
use Contoller\Middleware\RedirectUsersMiddleware;
use Model\Account;
use Model\Comment;
use Model\User;
use Validator\LoginValidator;
use View\View;

class LoginController extends Controller
{

    use RedirectUsersMiddleware;

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

    /**
     * @param LoginValidator $loginValidator
     * @return bool|View
     */
    public function postLogin(LoginValidator $loginValidator)
    {
        if (Request::isAjax()) {
            $loginValidator->makeValidate();
            $logWihEmailAdressOrID = filter_var($this->request->email_ou_identifiant, FILTER_VALIDATE_EMAIL);
            $data = $this->proceedToLogin($logWihEmailAdressOrID);
            Request::ajax($data, 200);
        }
        return Request::abort(404);
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

    /**
     * @param $class
     * @return User|Account
     */
    private function getUserOrAccount($class)
    {
        $response = '';
        switch ($class) {
            case 'User':
                $response = $this->runStatement('membre', User::class, 'email');
                break;
            case 'Account':
                $response = $this->runStatement('compte', Account::class, 'identifiant');
                break;
        }
        return $response;

    }

    /**
     * @param string $table
     * @param string $class
     * @param string $field
     * @return mixed
     */
    private function runStatement(string $table, string $class, string $field)
    {
        $class = new $class();
        return $class
            ->select($table)
            ->whereEqual($field, $this->request->email_ou_identifiant)
            ->limit('1')
            ->run();
    }

    private function LogUser(User $user)
    {
        $this->setSession($user);
        return $data = ['success' => true, 'redirectTo' => $this->redirectTo(), 'username' => $user->prenom];
    }

    private function proceedToLogin($check)
    {
        $response = [];
        switch ($check) {
            case $this->request->email_ou_identifiant:
                $response = $this->LogUser($this->getUser());
                break;
            case false :
                $response = $this->LogUser($this->getAccount()->user());
                break;
        }
        return $response;
    }

    /**
     * @param $name
     * @param $arguments
     * @return Account|User|string
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        return $this->getUserOrAccount(str_replace('get', '', $name));
    }
}