<?php

use Contoller\Http\Request;

/**
 * @param array $rootResult
 * @return void
 * fontion charger de gerer les root
 */
function processFundedRoot(array $rootResult)
{
    $handler = $rootResult[1];
    $urlVars = $rootResult[2];
    if (is_array($handler)) {
        $class = $handler['class'];
        $method = $handler['method'];
        if (key_exists("gets", $handler) && key_exists("vars", $handler)) {
            $vars = $handler['vars'];
            $classToInstanced = new $class();
            $classToInstanced->$method(...$urlVars, ...$vars);
        } elseif (key_exists("gets", $handler)) {
            $classToInstanced = new $class();
            $classToInstanced->$method(...$urlVars);
        } elseif (key_exists("vars", $handler)) {
            $vars = $handler['vars'];
            $classToInstanced = new $class();
            $classToInstanced->$method(...$vars);
        } else {
            $classToInstanced = new $class();
            $classToInstanced->$method();
        }
    } else if (is_callable($handler)) {
        call_user_func($handler,...$urlVars);
    } else {
        Request::abort(404);
    }

}

/**
 * @return string
 */
function rootUrl()
{
    $config = require "config/config.php";
    return $config["app_url"];
}

/**
 * @param int $code
 * check request code
 */
//function abort(int $code)
//{
//    switch ($code) {
//        case 404 :
//            header('HTTP/1.1 404 Internal Server Error');
//            break;
//    }
//}

/**
 * @param $name
 * @return mixed
 * Manage the global post variable more easily
 */
function post($name = "")
{
    if (empty($name)) {
        return $_POST;
    } else {
        return $_POST["name"];
    }

}

// /**
//  * Checks if the http request is an AJAX call
//  * @return bool
//  */
// function is_ajax()
// {
//     return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
//         (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
// }

/**
 * @param $string
 * @return string|string[]
 * this function remove the quotion in a string
 */
function replaceQuotion($string)
{
    return str_replace("'", "\'", $string) ? str_replace("'", "\'", $string) : $string;
}

/**
 * deleted space and HTML characters in a string
 * @param string $var
 * @return string
 */
function secureData(string $var)
{
    return htmlspecialchars(strip_tags(trim($var)));
}

/**
 * @param $vars
 * @param bool $do
 * Custum Vardump Print
 */
function debug($vars, $do = false)
{
    if (is_array($vars) && $do) {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    } else {
        $var = $vars;
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}

/**
 * @return string
 * Build bithday
 */
function selectBirthDay($id, $year = false)
{
    $option = '';
    if ($year) {
        $i = $id;
        while ($i <= date("Y")):
            $option .= sprintf("<option value='%d'>%d</option>", $i, $i);
            $i++;
        endwhile;
    } else {
        $i = 1;
        while ($i <= $id):
            $v = (string)$i;
            $v = (strlen($v) < 2) ? sprintf("0%s", $v) : $v;
            $option .= sprintf("<option value='%s'>%s</option>", $v, $v);
            $i++;
        endwhile;
    }
    return sprintf("%s\n", $option);
}

/**
 * @param $scripts
 * @return string
 */
function scripts($scripts = [])
{
    $script = "";
    if (!empty($scripts)) {
        foreach ($scripts as $val):
            $script .= sprintf("%s\n", $val);
        endforeach;
    }
    return $script;
}