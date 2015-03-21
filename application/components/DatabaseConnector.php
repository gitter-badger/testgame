<?php

namespace application\components;

use Slim\Slim;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

class DatabaseConnector
{
    /**
     * @var Capsule
     */
    public $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule();
        $this->initDb();
    }

    protected function initDb()
    {
        $app = Slim::getInstance();
        $this->capsule->addConnection([
            'driver'    => $app->config('db.driver'),
            'host'      => $app->config('db.host'),
            'database'  => $app->config('db.name'),
            'username'  => $app->config('db.username'),
            'password'  => $app->config('db.password'),
            'charset'   => $app->config('db.charset'),
            'collation' => $app->config('db.collation'),
            'prefix'    => $app->config('db.prefix')
        ]);

        $this->capsule->setEventDispatcher(new Dispatcher( new Container()));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }
}