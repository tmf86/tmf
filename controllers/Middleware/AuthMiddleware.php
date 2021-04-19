<?php


namespace Contoller\Middleware;


use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Model\Account;
use Model\User;
use View\View;

trait AuthMiddleware
{

    /**
     * @param bool $useRedirectURL
     * @return bool|View
     */
    public function useAuth()
    {
        return (!$this->isAuth()) ? redirect('login', true) : true;
    }

    /**
     * @return bool
     */
    protected function isAuth()
    {
        $isAuth = ($this->request->hasSession('user_id') && $this->getToken($this->request->session('token')) && $this->user());
        if (!$isAuth) {
            $this->UnsetUserSession();
            return false;
        }
        return true;

    }

    /**
     * @return string
     */
    protected function generateToken(): string
    {
        return JWT::encode([
            "iat" => time() + 2,
            'exp' => time() + 7200],
            JWT_KEY);
    }

    /**
     * @param string $jwt
     * @return false|object
     */
    protected function getToken(string $jwt)
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
     * @return array|false|mixed
     */
    protected function user()
    {
        return (self::asUser()) ? self::asUser()->account() : false;
    }

    /**
     * @return View
     */
    protected function makelogout(bool $completedLogout = false)
    {
        $this->UnsetUserSession();
        if ($completedLogout) {
            $this->request->sessionUnset('redirectTo');
            $this->request->sessionUnset('setreplaysession');
            $this->request->sessionUnset('replay');
            $this->request->sessionUnset('subject');
            $this->request->sessionUnset($this->request->getClientIp());
        }
        return redirect('home', true);
    }

    protected function UnsetUserSession()
    {
        $this->request->sessionUnset('user_id');
        $this->request->sessionUnset('token');
        $this->request->sessionUnset('name');
        $this->request->sessionUnset('email');
        $this->request->sessionUnset('url');
        $this->request->sessionUnset('resended');
    }

    /**
     * @return bool
     */
    public static function asUserAuthenticated()
    {
        return (session('user_id') && session('token') && self::asUser());
    }

    /**
     * @return User|bool
     */
    protected static function asUser()
    {
        $user = new User();
        if (session('user_id')) {
            return $user->find(session('user_id'));
        }
        return false;
    }
}
