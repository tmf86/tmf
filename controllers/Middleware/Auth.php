<?php


namespace Contoller\Middleware;


use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Model\Account;
use Model\User;
use View\View;

trait Auth
{

    /**
     * @return bool|View
     */
    public function useAuth(string $origin = '')
    {
        if ($this->isAuth()) {
            return true;
        }
        $this->request->sessionUnset('user_id');
        $this->request->sessionUnset('token');
        $this->request->sessionUnset('name');
        $this->request->sessionUnset('email');
        $this->request->sessionUnset('url');
        $this->request->sessionUnset('resended');
        if (!empty($origin)) {
            return redirect("login?origin=$origin", true);
        }
        return redirect('login', true);
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        $isAuth = ($this->request->hasSession('user_id') && $this->getToken($this->request->session('token')));
        if ($isAuth) {
            return true;
        }
        $this->request->sessionUnset('user_id');
        $this->request->sessionUnset('token');
        $this->request->sessionUnset('name');
        $this->request->sessionUnset('email');
        $this->request->sessionUnset('url');
        $this->request->sessionUnset('resended');
        return false;
    }

    /**
     * @return string
     */
    public function generateToken(): string
    {
        return JWT::encode([
            "iat" => time() + 2,
            'exp' => time() + 3600],
            JWT_KEY);
    }

    /**
     * @param string $jwt
     * @return false|object
     */
    public function getToken(string $jwt)
    {
        try {
            $jwted = JWT::decode($jwt, JWT_KEY, JWT_ALGORITHM);
        } catch (ExpiredException $ex) {
            $jwted = false;
        }
        return $jwted;
    }

    /**
     * @return false|View
     */
    public function authenticated()
    {
        if (!$this->isAuth()) {
            return false;
        }
        return redirect('profile', true);
    }

    /**
     * @return Account|bool;
     */
    public function user()
    {
        $user = new User();
        if ($this->isAuth()) {
            $user_id = $this->request->session('user_id');
            $user = new User();
            $user = $user->find($user_id)->account();
        }
        return $user;
    }

    /**
     * @return View
     */
    public function logoutProcess()
    {
        $this->request->sessionUnset('user_id');
        $this->request->sessionUnset('token');
        $this->request->sessionUnset('name');
        $this->request->sessionUnset('email');
        $this->request->sessionUnset('url');
        $this->request->sessionUnset('resended');
        return redirect('home', true);
    }

    /**
     * @return bool
     */
    public static function asUserAuthenticated()
    {
        return (session('user_id') && session('token'));
    }
}
