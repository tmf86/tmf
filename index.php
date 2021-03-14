<?php

use Contoller\LoginController;
use Contoller\FinalizeAccountController;
use Contoller\FormationController;
use Contoller\HomeController;
use Contoller\Http\Request;
use Contoller\RegisterController;
use Contoller\RegisterSuccess;
use Contoller\SujetController;

require "vendor/autoload.php";
require 'config/app.php';
require 'config/database.php';
require 'config/email.php';
require 'config/email_api.php';
require 'config/jwt.php';
require "helpers/helper.php";
session_start();

/*
 *  NB : Si j'allais jamais il est question de créer un controller qui a besoin a la fois de variable envoyé
    par la methode GET et aussi de variable passé depuis la route voici l'ordre dans la quelle les paramettres de
    Cette methode du controller doivent - être definis : --->($variables_envoyé_depuis_la_route,$variales_envoyé_depuis,la_methode_get)
*/

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/Cpy-Mvc/',
        [
            'class' => HomeController::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/login',
        [
            'class' => LoginController::class,
            'method' => 'index'
        ]);
    $r->addRoute('POST', '/Cpy-Mvc/post-login',
        [
            'class' => LoginController::class,
            'method' => 'postLogin'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/home',
        [
            'class' => HomeController::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/register',
        [
            'class' => RegisterController::class,
            'method' => 'index'
        ]);
    $r->addRoute('POST', '/Cpy-Mvc/registerstore',
        [
            'class' => RegisterController::class,
            'method' => 'registerStore'
        ]);
    $r->addGroup('/Cpy-Mvc/finalize_account_creation/', function (FastRoute\RouteCollector $r) {

        $r->addRoute('GET', '{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9.@]+}',
            [
                'class' => FinalizeAccountController::class,
                'method' => 'index',
                'gets' => true

            ]);
        $r->addRoute('POST', '{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9@.]+}',
            [
                'class' => FinalizeAccountController::class,
                'method' => 'accountStore',
                'gets' => true

            ]);

    });
    $r->addRoute('GET', '/Cpy-Mvc/sujets',
        [
            'class' => SujetController::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/parrainage', [
        'class' => \Contoller\ParrainageController::class,
        'method' => 'index'
    ]);
    $r->addRoute('GET', '/Cpy-Mvc/demande', [
        'class' => \Contoller\ParrainageController::class,
        'method' => 'demande'
    ]);
    $r->addRoute('GET', '/Cpy-Mvc/tabl', [
        'class' => \Contoller\ParrainageController::class,
        'method' => 'tableau_de_bord'
    ]);
    $r->addRoute('GET', '/Cpy-Mvc/cours',
        [
            'class' => FormationController::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/videos_formation',
        [
            'class' => FormationController::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/videos_formation/{id:\d+}',
        function () {
            echo 'Hello !';
        }
    );
    $r->addRoute('GET', '/Cpy-Mvc/about-us', function () {
        $title = 'A propos';
        return new View\View('pages.apropos', compact('title'));
    });
    $r->addRoute('GET', '/Cpy-Mvc/profile', function () {
        $title = 'Profile';
        return new View\View('pages.profile', compact('title'), false);
    });
    $r->addRoute('GET', '/Cpy-Mvc/registration-success',
        [
            'class' => RegisterSuccess::class,
            'method' => 'index'
        ]);
    $r->addRoute('GET', '/Cpy-Mvc/test', function () {

//       $mailer = new \Service\FinalizeAccountMailer('fake','encore','url');
//       $mailer->mail(new Request(),false);

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