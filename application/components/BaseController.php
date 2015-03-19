<?php
namespace application\components;
use Slim\Slim;

abstract class BaseController
{
    /**
     * @var Slim
     */
    private $app;

    /**
     * @var \Slim\Http\Request
     */
    private $request;

    public function __construct()
    {
        $this->app = Slim::getInstance();
        $this->request = $this->app->request;
    }

    /**
     * @param $content
     * @param int $statusCode
     */
    public function sendJson($content, $statusCode = 200)
    {
        $this->app->response->setStatus($statusCode);

        $this->app->response->setBody(
            \json_encode($content)
        );
    }

    /**
     * @return \Slim\Http\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}