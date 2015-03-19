<?php
namespace application\controllers;
use application\components\BaseController;

class TestController extends BaseController
{
    public function hello($name)
    {
        $this->sendJson(
            ['name' => $name],
            201
        );
    }

    public function test()
    {
        echo 'azaza';
    }
}