<?php


namespace Contoller\middleware;


use Contoller\Http\Request;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use View\View;

trait Auth
{

    public function __construct()
    {
        $this->request = new Request();
    }

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
        return redirect('connexion', true);
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return ($this->request->hasSession('user_id') && self::getToken($this->request->session('token')));
    }

    /**
     * @return string
     */
    public static function generateToken()
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
    public static function getToken(string $jwt)
    {
        try {
            $jwt = JWT::decode($jwt, JWT_KEY, JWT_ALGORITHM);
        } catch (ExpiredException $ex) {
            $jwt = false;
        }
        return $jwt;
    }
}
