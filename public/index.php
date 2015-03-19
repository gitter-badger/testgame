<?php
require '../vendor/autoload.php';

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/application');

// PSR-4 стандартный автолоадер всего что внутри application
require 'autoload.php';

$config = require APP_DIR . '/config/development.php';

$app = new \Slim\Slim($config);

$routes = require APP_DIR . '/routes/routes.php';

// Инжектим database
$app->container->singleton('db', function(){
    return new \application\components\DatabaseConnector();
});

// Регистрируем роуты. Ваще надо бы вынести в какой-нибудь Router
foreach($routes as $route) {
    $httpMethod = $route[0];
    $routeString = $route[1];
    $controller = $route[2];
    $action = $route[3];

    $controllerClass = 'application\controllers\\' . ucfirst($controller) . 'Controller';
    $controllerObject = new $controllerClass;
    $callable = [$controllerObject, $action];

    if(is_callable($callable)) {
        $app->$httpMethod(
            $routeString,
            $callable
        );
    }
}

$app->run();
