<?php

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
UuidGenerete();

/*
 *  NB : Si jamais il est question d'instancier un controller qui a besoin a la fois de variable qui sera un paramettre envoyé
 *  dans la requête et aussi de variable passé depuis la route voici l'ordre dans la quelle les paramettres de
    Cette methode du controller doivent - être definis : --->($variables_envoyé_depuis_la_route,$variales_envoyé_depuis_la_requête)
*/
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/home', ['class' => HomeController::class, 'method' => 'index']);
    $route->get('/login', ['class' => LoginController::class, 'method' => 'index']);
    $route->post('/login', ['class' => LoginController::class, 'method' => 'postLogin',
        'vars' => [new LoginValidator()]]);
    $route->get('/register', ['class' => RegisterController::class, 'method' => 'index']);
    $route->post('/registerstore', ['class' => RegisterController::class, 'method' => 'registerStore',
        'vars' => [new RegisterValidator()]]);
    $route->get('/sujets', ['class' => SujetController::class, 'method' => 'index']);
    $route->get('/demande', ['class' => ParrainageController::class, 'method' => 'demande']);
    $route->post('/demande', ['class' => ParrainageController::class, 'method' => 'generatDemand']);
    $route->post('/parrainage', ['class' => LogParController::class, 'method' => 'loging']);
    $route->get('/parrainage', ['class' => LogParController::class, 'method' => 'parrainage']);
    $route->get('/tabl', ['class' => DashbordParController::class, 'method' => 'index']);
    $route->get('/initPar', ['class' => DashbordParController::class, 'method' => 'initParrainage']);

    $route->get('/cours', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/videos_formation', ['class' => FormationController::class, 'method' => 'index']);
    $route->get('/registration-success', ['class' => RegisterSuccess::class, 'method' => 'index']);
    $route->get('/profile', ['class' => ProfileController::class, 'method' => 'index']);
    $route->post('/profile-update', ['class' => ProfileController::class, 'method' => 'profileUpdate',
        'vars' => [new ProfileUpdateValidator()]]);
    $route->get('/forum', ['class' => ForumController::class, 'method' => 'index']);
    $route->get('/forum/categorie/{forum:[A-Za-z\-]+}', ['class' => ForumController::class,
        'method' => 'category', 'gets' => true, 'vars' => [new ValidateForumCategoryRequest()]]);
    $route->post('/forum/categorie/{forum:[A-Za-z\-]+}', ['class' => ForumController::class,
        'method' => 'addNewSubject', 'gets' => true, 'vars' => [
            new ForumAddSubjectValidator(),
            new ValidateForumCategoryRequest()
        ]]);
    $route->get('/forum/subject/{subject:[A-Za-z0-9\-]+}', ['class' => ForumController::class,
        'method' => 'subjectView', 'gets' => true, 'vars' => [
            new ValidateSubjectRequest()
        ]]);
    $route->post('/forum/subject/{subject:[A-Za-z0-9\-]+}', ['class' => ForumController::class,
        'method' => 'replyToSubject', 'gets' => true, 'vars' => [
            new ValidateSubjectRequest(),
            new ReplaySubjectValidator()
        ]]);
    $route->get('/logout', ['class' => Logout::class, 'method' => 'logout']);
    $route->addGroup('/finalize_account_creation/', function (FastRoute\RouteCollector $route) {
        $route->get('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9.@]+}', ['class' => FinalizeAccountController::class, 'method' => 'index', 'gets' => true]);
        $route->post('{id:[A-Z0-9\-]+}/{email:[A-Za-z0-9@.]+}', ['class' => FinalizeAccountController::class, 'method' => 'accountStore', 'gets' => true]);
    });
    $route->get('/videos_formation/{id:\d+}',
        function () {
            echo 'Hello !';
        }
    );
    $route->get('/about-us', function () {
        $title = 'A propos';
        return new View\View('pages.apropos', compact('title'));
    });
    $route->get('/test', function () {

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