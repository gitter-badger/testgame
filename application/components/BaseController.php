<?php
namespace application\components;
use Slim\Slim;

/**
 * Class BaseController
 * @package application\components
 */
abstract class BaseController
{
    /**
     * @var Slim
     */
    protected $app;

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

        $this->app->response->headers->set('Content-Type', 'application/json');

        $this->app->response->setBody(
            \json_encode($content)
        );
    }

    public function send404()
    {
        $this->app->halt(404, 'Resource not found');
    }

    /**
     * @return \Slim\Http\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setCookie($key, $value)
    {
        $this->app->response->setCookie($key, $value);
    }

    /**
     * @return null|\Slim\Route
     */
    protected function getRoute()
    {
        return $this->app->router->getCurrentRoute();
    }
}