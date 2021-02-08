<?php

use Contoller\ConnexionController;
use Contoller\HomeController;
use Contoller\HttpRequest\Request;
use Contoller\RegisterController;

require "vendor/autoload.php";
require "helpers/helper.php";

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/Cpy-Mvc/', ["class" => HomeController::class, "method" => "index"]);
    $r->addRoute('GET', '/Cpy-Mvc/connexion', ["class" => ConnexionController::class, "method" => "index"]);
    $r->addRoute('GET', '/Cpy-Mvc/acceuil', ["class" => HomeController::class, "method" => "index"]);
    $r->addRoute('GET', '/Cpy-Mvc/inscription', ["class" => RegisterController::class, "method" => "index"]);
    $r->addRoute('POST', '/Cpy-Mvc/registerStore', ["class" => RegisterController::class, "method" => "registerStore", "var" => new Request($_POST)]);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        abort(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        abort(404);
        break;
    case FastRoute\Dispatcher::FOUND:
        processFundedRoot($routeInfo);
        // ... call $handler with $vars
        break;
}