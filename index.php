<?php

use Contoller\LoginController;
use Contoller\FinalizeAccountController;
use Contoller\FormationController;
use Contoller\HomeController;
use Contoller\Http\Request;
use Contoller\ParrainageController;
use Contoller\RegisterController;
use Contoller\RegisterSuccess;
use Contoller\SujetController;
use Service\Mailer\FinalizeAccountMailer;

require "vendor/autoload.php";
require 'config/app.php';
require 'config/database.php';
require 'config/email.php';
require 'config/jwt.php';
require "helpers/helper.php";
session_start();

/*
 *  NB : Si jamais il est question d'instancier un controller qui a besoin a la fois de variable qui sera un paramettre envoyé
 *  dans la requête de  GET et aussi de variable passé depuis la route voici l'ordre dans la quelle les paramettres de
    Cette methode du controller doivent - être definis : --->($variables_envoyé_depuis_la_route,$variales_envoyé_depuis,la_methode_get)
*/

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/Cpy-Mvc/', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/login', ['class' => LoginController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/post-login', ['class' => LoginController::class, 'method' => 'postLogin']);
    $route->get('/Cpy-Mvc/home', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/register', ['class' => RegisterController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/registerstore', ['class' => RegisterController::class, 'method' => 'registerStore']);
    $route->addGroup('/Cpy-Mvc/finalize_account_creation/', function (FastRoute\RouteCollector $route) {
        $route->get('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9.@]+}', ['class' => FinalizeAccountController::class, 'method' => 'index', 'gets' => true]);
        $route->post('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9@.]+}', ['class' => FinalizeAccountController::class, 'method' => 'accountStore', 'gets' => true]);
    });
    $route->get('/Cpy-Mvc/sujets', ['class' => SujetController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/parrainage', ['class' => ParrainageController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/demande', ['class' => ParrainageController::class, 'method' => 'demande']);
    $route->get('/Cpy-Mvc/tabl', ['class' => ParrainageController::class, 'method' => 'tableau_de_bord']);
    $route->get('/Cpy-Mvc/cours', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/videos_formation', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/registration-success', ['class' => RegisterSuccess::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/videos_formation/{id:\d+}',
        function () {
            echo 'Hello !';
        }
    );
    $route->get('/Cpy-Mvc/about-us', function () {
        $title = 'A propos';
        return new View\View('pages.apropos', compact('title'));
    });
    $route->get('/Cpy-Mvc/profile', function () {
        $title = 'Profile';
        return new View\View('dashbord.profile', compact('title'));
    });
    $route->get('/Cpy-Mvc/test', function () {
////        $data = 15;
////        ob_start();
////        view('pages.home');
////        $p = ob_get_clean();
////        echo $p;
    });
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
        Request::abort(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        Request::abort(404);
        break;
    case FastRoute\Dispatcher::FOUND:
        processFundedRoot($routeInfo);
        // ... call $handler with $vars
        break;
}