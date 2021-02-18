<?php


namespace Contoller\Http;

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

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = &$_GET;
        $this->cookies = &$_COOKIE;
        $this->sessions = &$_SESSION;
        $this->inputs = &$_POST;
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
            (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    /**
     * @param int $code
     */
    public static function abort(int $code)
    {
        switch ($code) {
            case 404 :
                header('HTTP/1.1 404 Internal Server Error');
                break;
        }
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

    public function session(string $key = "", string $value = "")
    {
        if (!empty($key) && empty($value)) {
            if (key_exists($key, $this->sessions)) {
                return $this->sessions["$key"];
            } else {
                throw  new  \Exception("The key ask  doesn't exist.");
            }
        } else if (!empty($key) && !empty($value)) {
            $this->sessions["$key"] = $value;
            return $this->sessions["$key"];
        } else {
            return $this->sessions;
        }
    }

    /**
     * @param $name
     * @return mixed|string
     */
    public function __get($name)
    {
        //Je verifie si la propriéte demander est une clé de l'un
        // des attribut $post ou $get
        if (key_exists($name, $this->inputs)) {
            $value = $this->inputs["$name"];
        } else if (key_exists($name, $this->get)) {
            $value = $this->get["$name"];
        } else {
            throw new \Exception("The property don't exist.");
        }
        return $value;
    }

}