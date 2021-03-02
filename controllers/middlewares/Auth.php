<?php


namespace Contoller\middleware;


use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use View\View;

trait Auth
{

    /**
     * @return bool|View
     */
    public function useAuth()
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
        return redirect('login', true);
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return ($this->request->hasSession('user_id') && $this->getToken($this->request->session('token')));
    }

    /**
     * @return string
     */
    public function generateToken()
    {
        return JWT::encode([
            "iat" => JWT_START_VALIDATE,
            'exp' => JWT_TIME_LIMIT],
            JWT_KEY);
    }

    /**
     * @param string $jwt
     * @return false|object
     */
    public function getToken(string $jwt)
    {
        try {
            $jwt = JWT::decode($jwt, JWT_KEY, JWT_ALGORITHM);
        } catch (ExpiredException $ex) {
            $jwt = false;
        }
        return $jwt;
    }
}
