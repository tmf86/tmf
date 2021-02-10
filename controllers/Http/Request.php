<?php


namespace Contollers\HttpRequest;


class Request
{
    /**
     * @var array
     */
    private $inputs;
    /**
     * @var array
     */
    private $get;
    /**
     * @var array
     */
    private $cookies;
    /**
     * @var array
     */
    private $sessions;

    public function __construct(&$post = [], &$get = [], $cookies = [], $sessions = [])
    {
        $this->get = &$get;
        $this->cookies = $cookies;
        $this->sessions = $sessions;
        $this->inputs = &$post;
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
     */
    public function ajax(array $data, $code)
    {
//        http_response_code($code);
        echo json_encode($data);
//        return $this;
    }

    /**
     * @param $name
     * @return mixed|string
     */
    public function __get($name)
    {
        //Je verifie si la propriéte demander est une clé de l'un de
        // des attribut $post , $get , $cookies ou encore $session
        $value = "";
        if (key_exists($name, $this->inputs)) {
            $value = $this->inputs["$name"];
        } else if (key_exists($name, $this->sessions)) {
            $value = $this->sessions["$name"];
        } else if (key_exists($name, $this->get)) {
            $value = $this->get["$name"];
        } else if (key_exists($name, $this->cookies)) {
            $value = $this->cookies["$name"];
        } else {
            echo "cette priopriétés n'existe pas !";
        }
        return $value;
    }

}