<?php


namespace Contoller\Http;


use Service\File\Files;
use View\View;

class Request
{
    /*** @var array */
    private $inputs;
    /*** @var array */
    private $get;
    /*** @var array */
    private $cookies;
    /*** @var array */
    private $sessions;
    /*** @var array */
    private $files;
    /*** @var array */
    private static $errors = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = &$_GET;
        $this->cookies = &$_COOKIE;
        $this->sessions = &$_SESSION;
        $this->inputs = &$_POST;
        $this->files = new Files();
    }

    /**
     * @return array
     */
    public function inputs()
    {
        return $this->inputs;
    }

    /**
     * @return bool
     */
    public function isAjax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'));
    }

    /**
     * @param string $key
     */
    public function sessionUnset(string $key): void
    {

        if ($this->hasSession($key)) {
            unset($this->sessions[$key]);
        }
    }

    /**
     * @param int $code
     * @return bool|View
     */
    public static function abort(int $code)
    {
        switch ($code) {
            case 404 :
                http_response_code(404);
                return redirect('pages.404.404', false, 404, [], false);
                break;
        }
        return true;
    }

    /**
     * @param array $data
     * @param $code
     * @return $this
     */
    public function ajax(array $data, $code)
    {
        http_response_code($code);
        echo json_encode($data);
        return $this;
    }

    /**
     * @param int $value
     * @return void
     */
    public function sleepRequest(int $value)
    {
        sleep($value);
    }

    /***
     * @param string $key
     * @param string $value
     * @return array|mixed|string
     * @throws \Exception
     */
    public function session(string $key = "", string $value = "")
    {
        if (!empty($key) && empty($value)) {
            if (array_key_exists($key, $this->sessions)) {
                return $this->sessions["$key"];
            }
            throw  new  \Exception("The key ask  doesn't exist.");
        }
        if (!empty($key) && !empty($value)) {
            $this->sessions["$key"] = $value;
            return $this->sessions["$key"];
        }

        return $this->sessions;
    }

    /**
     * @param string $key
     * @return bool
     * verifie si cette clé de session existe
     */
    public function hasSession(string $key)
    {
        return (isset($this->sessions[$key]));
    }

    /**
     * @param string $key
     * @param string $value
     * @return array|mixed|string
     * @throws \Exception
     */
    public static function error(string $key = "", string $value = "")
    {
        if (!empty($key) && empty($value)) {
            if (array_key_exists($key, self::$errors)) {
                return self::$errors["$key"];
            }
            throw  new  \Exception("The key ask  doesn't exist.");
        }
        if (!empty($key) && !empty($value)) {
            self::$errors["$key"] = $value;
            return self::$errors["$key"];
        }

        return self::$errors;
    }

    /**
     * @param string $key
     * @return bool
     * verifie si cette clé d'erreur existe
     */
    public static function hasError(string $key)
    {
        return (isset(self::$errors[$key]));
    }

    /**
     * @param string $key
     * @return bool
     * verifie si cette clé existe existe dans la variable globale get
     */
    public function hasGetKey(string $key)
    {
        return (isset($this->get[$key]));
    }

    /**
     * @param string $key
     * @return bool
     * verifie si cette clé existe existe dans la variable globale post
     */
    public function hasPostKey(string $key)
    {
        return (isset($this->post[$key]));
    }

    /**
     * @param array $errors
     */
    public static function setErrors(array $errors): void
    {
        self::$errors = $errors;
    }

    /**
     * @param $name
     * @return \Service\File\FilesUpload
     * @throws \Exception
     */
    public function file($name)
    {
        return $this->files->file($name);
    }

    /**
     * @param $name
     * @return mixed|string
     */
    public function __get($name)
    {
        //Je verifie si la propriéte demander est une clé de l'un
        // des attribut $post ou $get
        if (array_key_exists($name, $this->inputs)) {
            $value = $this->inputs["$name"];
        } else if (array_key_exists($name, $this->get)) {
            $value = $this->get["$name"];
        } else {
            throw new \Exception("The property don't exist.");
        }
        return $value;
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }


}