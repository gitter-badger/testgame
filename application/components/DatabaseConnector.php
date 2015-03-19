<?php

namespace application\components;

use Slim\Slim;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

class DatabaseConnector
{
    public $capsule;
    public $app;

    public function __construct()
    {
        $this->app = Slim::getInstance();
        $this->capsule = new Capsule();
        $this->initDb();
    }

    protected function initDb()
    {
        $this->capsule->addConnection([
            'driver'    => $this->app->config('db.driver'),
            'host'      => $this->app->config('db.host'),
            'database'  => $this->app->config('db.name'),
            'username'  => $this->app->config('db.username'),
            'password'  => $this->app->config('db.password'),
            'charset'   => $this->app->config('db.charset'),
            'collation' => $this->app->config('db.collation'),
            'prefix'    => $this->app->config('db.prefix')
        ]);

        $this->capsule->setEventDispatcher(new Dispatcher( new Container()));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }
}