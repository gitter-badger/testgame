<?php

namespace application\components;

use Slim\Slim;

class DatabaseConnector
{
    public function __construct()
    {
        $app = Slim::getInstance();
        \ORM::configure(
            $app->config('dbDriver') . ':' .
            $app->config('host') . '; ' .
            $app->config('dbName')
        );

        \ORM::configure('username', $app->config('dbUsername'));
        \ORM::configure('password', $app->config('dbPassword'));
    }
}