<?php
require_once 'vendor/autoload.php';

use App\Repositories\MySQLRepository;
use App\Repositories\DBRepository;
use App\Controllers\StocksController;
use App\Services\StocksService;


$container = new League\Container\Container;
$container->add(DBRepository::class, MySQLRepository::class);

$container->add(StocksController::class, StocksController::class)->
addArgument(StocksService::class);
$container->add(StocksService::class, StocksService::class)->
addArgument(DBRepository::class);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [StocksController::class, 'updateMyStocks']);
    $r->addRoute('POST', '/', [StocksController::class, 'updateMyStocks']);

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
