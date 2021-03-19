<?php
require_once 'vendor/autoload.php';

use App\Controllers\CarRentalController;
use App\Controllers\CarAddController;


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '/', [CarRentalController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/admin', [CarAddController::class, 'index']);

});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        list($class, $method) = $handler;
        call_user_func_array([new $class, $method], $vars);

        break;
}


