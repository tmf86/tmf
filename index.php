<?php

use Contoller\AdminController;
use Contoller\DashbordParController;
use Contoller\ForumController;
use Contoller\LoginController;
use Contoller\FinalizeAccountController;
use Contoller\FormationController;
use Contoller\HomeController;
use Contoller\Http\Request;
use Contoller\Logout;
use Contoller\LogParController;
use Contoller\Middleware\TaskBeforeRequest\ValidateForumCategoryRequest;
use Contoller\Middleware\TaskBeforeRequest\ValidateSubjectRequest;
use Contoller\ParrainageController;
use Contoller\ProfileController;
use Contoller\RegisterController;
use Contoller\RegisterSuccess;
use Contoller\SujetController;
use Validator\ForumAddSubjectValidator;
use Validator\LoginValidator;
use Validator\ProfileUpdateValidator;
use Validator\RegisterValidator;
use Validator\ReplaySubjectValidator;

require "vendor/autoload.php";
require 'config/app.php';
require 'config/database.php';
require 'config/email.php';
require 'config/jwt.php';
require "helpers/helper.php";
session_start();
try {
    UuidGenerete();
} catch (Exception $e) {
}

/*
 *  NB : Si jamais il est question d'instancier un controller qui a besoin a la fois de variable qui sera un paramettre envoyé
 *  dans la requête et aussi de variable passé depuis la route voici l'ordre dans la quelle les paramettres de
    Cette methode du controller doivent - être definis : --->($variables_envoyé_depuis_la_route,$variales_envoyé_depuis_la_requête)
*/
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/Cpy-Mvc/', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/home', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/login', ['class' => LoginController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/login', ['class' => LoginController::class, 'method' => 'postLogin',
        'vars' => [new LoginValidator()]]);
    $route->get('/Cpy-Mvc/register', ['class' => RegisterController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/registerstore', ['class' => RegisterController::class, 'method' => 'registerStore',
        'vars' => [new RegisterValidator()]]);
    $route->get('/Cpy-Mvc/sujets', ['class' => SujetController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/demande', ['class' => ParrainageController::class, 'method' => 'demande']);
    $route->post('/Cpy-Mvc/demande', ['class' => ParrainageController::class, 'method' => 'generatDemand']);
    $route->post('/Cpy-Mvc/parrainage', ['class' => LogParController::class, 'method' => 'loging']);
    $route->get('/Cpy-Mvc/parrainage', ['class' => LogParController::class, 'method' => 'parrainage']);
    $route->get('/Cpy-Mvc/tabl', ['class' => DashbordParController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/initPar', ['class' => DashbordParController::class, 'method' => 'initParrainage']);
    $route->post('/Cpy-Mvc/exit_Par', ['class' => DashbordParController::class, 'method' => 'sign_out']);
    $route->get('/Cpy-Mvc/05c9831985d00cf6f4dc0740f7b2c361', ['class' =>AdminController::class, 'method' => 'index']);
    $route->post('/Cpy-Mvc/c9831985d00cf', ['class' =>AdminController::class, 'method' => 'login']);
    $route->get('/Cpy-Mvc/home_admin', ['class' =>AdminController::class, 'method' => 'home_admin']);

    $route->get('/Cpy-Mvc/cours', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/videos_formation', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/registration-success', ['class' => RegisterSuccess::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/profile', ['class' => ProfileController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/suggestion', ['class' => ProfileController::class, 'method' => 'suggestion']);
    $route->post('/Cpy-Mvc/suggestion', ['class' => ProfileController::class, 'method' => 'suggestion_send']);
    $route->get('/Cpy-Mvc/validation', ['class' => ProfileController::class, 'method' => 'validation']);
    $route->post('/Cpy-Mvc/validation', ['class' => ProfileController::class, 'method' => 'validation_send']);
    $route->get('/Cpy-Mvc/notifications', ['class' => ProfileController::class, 'method' => 'notifications']);
    $route->get('/Cpy-Mvc/all_notifs', ['class' => ProfileController::class, 'method' => 'AllNotifications']);

    $route->post('/Cpy-Mvc/profile-update', ['class' => ProfileController::class, 'method' => 'profileUpdate',
        'vars' => [new ProfileUpdateValidator()]]);
    $route->get('/Cpy-Mvc/forum', ['class' => ForumController::class, 'method' => 'index']);
    $route->get('/Cpy-Mvc/forum/categorie/{forum:[A-Za-z\-]+}', ['class' => ForumController::class,
        'method' => 'category', 'gets' => true, 'vars' => [new ValidateForumCategoryRequest()]]);
    $route->post('/Cpy-Mvc/forum/categorie/{forum:[A-Za-z\-]+}', ['class' => ForumController::class,
        'method' => 'addNewSubject', 'gets' => true, 'vars' => [
            new ForumAddSubjectValidator(),
            new ValidateForumCategoryRequest()
        ]]);
    $route->get('/Cpy-Mvc/forum/subject/{subject:[A-Za-z0-9\-]+}', ['class' => ForumController::class,
        'method' => 'subjectView', 'gets' => true, 'vars' => [
            new ValidateSubjectRequest()
        ]]);
    $route->post('/Cpy-Mvc/forum/subject/{subject:[A-Za-z0-9\-]+}', ['class' => ForumController::class,
        'method' => 'replyToSubject', 'gets' => true, 'vars' => [
            new ValidateSubjectRequest(),
            new ReplaySubjectValidator()
        ]]);
    $route->get('/Cpy-Mvc/logout', ['class' => Logout::class, 'method' => 'logout']);
    $route->addGroup('/Cpy-Mvc/finalize_account_creation/', function (FastRoute\RouteCollector $route) {
        $route->get('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9.@]+}', ['class' => FinalizeAccountController::class, 'method' => 'index', 'gets' => true]);
        $route->post('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9@.]+}', ['class' => FinalizeAccountController::class, 'method' => 'accountStore', 'gets' => true]);
    });
    $route->get('/Cpy-Mvc/videos_formation/{id:\d+}',
        function () {
            echo 'Hello !';
        }
    );
    $route->get('/Cpy-Mvc/about-us', function () {
        $title = 'A propos';
        return new View\View('pages.apropos', compact('title'));
    });
    $route->get('/Cpy-Mvc/root', function () {
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