<?php
namespace application\controllers;
use application\components\BaseController;

class TestController extends BaseController
{
    public function hello($name)
    {
        echo $name;
    }

    public function test()
    {
        echo 'azaza';
    }
}