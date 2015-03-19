<?php

namespace application\components;

use Slim\Slim;

class DatabaseConnector
{
    public function __construct()
    {
        $app = Slim::getInstance();
        \ORM::configure(
            $app->config('db.driver') . ':' .
            $app->config('db.host') . '; ' .
            $app->config('db.name')
        );

        \ORM::configure('username', $app->config('db.username'));
        \ORM::configure('password', $app->config('db.password'));
    }
}