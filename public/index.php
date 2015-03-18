<?php
require '../vendor/autoload.php';

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/application');

$config = require APP_DIR . '/config/development.php';

$app = new \Slim\Slim($config);

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->run();
