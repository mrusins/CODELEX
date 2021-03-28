<?php
require_once 'vendor/autoload.php';

use App\Controllers\PersonSearchController;
use App\Controllers\PersonAdminController;



$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '/', [PersonSearchController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/admin', [PersonAdminController::class, 'index']);

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


?>
