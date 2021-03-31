<?php
require_once 'vendor/autoload.php';

use App\Controllers\PersonSearchController;
use App\Controllers\PersonAdminController;
use App\Controllers\TestController;
use App\Repositories\MySQLPersonsRepository;
use App\Repositories\PersonsRepository;
use App\Services\AdminPersonService;
use App\Services\SearchPersonService;


$container = new League\Container\Container;

$container->add(PersonsRepository::class, MySQLPersonsRepository::class);

$container->add(PersonAdminController::class, PersonAdminController::class)->
addArgument(AdminPersonService::class);
$container->add(AdminPersonService::class, AdminPersonService::class)->
addArgument(PersonsRepository::class);

$container->add(PersonSearchController::class, PersonSearchController::class)->
addArgument(SearchPersonService::class);
$container->add(SearchPersonService::class, SearchPersonService::class)->
addArgument(PersonsRepository::class);

$container->add(TestController::class, TestController::class)->
addArgument(SearchPersonService::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute(['GET', 'POST'], '/', [PersonSearchController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/admin', [PersonAdminController::class, 'index']);
    $r->addRoute(['GET', 'POST'], '/test', [TestController::class, 'index']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = $handler;
        echo($container->get($controller)->$method($vars));

        break;
}
?>
