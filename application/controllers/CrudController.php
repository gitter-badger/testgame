<?php
namespace application\controllers;

use application\components\BaseController;
use application\components\AbstractModel;

/**
 * Class CrudController
 * @package application\controllers
 */
class CrudController extends BaseController
{
    /**
     * @param string $model
     * @param int $id
     */
    public function showAction($model, $id)
    {
        $modelClassName = $this->getModelFullClassName($model);
        $object = $modelClassName::find($id);

        if($object) {
            $this->sendJson($object);
        }else{
            $this->send404();
        }
    }

    /**
     * @param string $model
     */
    public function listAction($model)
    {
        $modelClassName = $this->getModelFullClassName($model);
        $objects = $modelClassName::all();
        $this->sendJson($objects);
    }

    /**
     * @param string $model
     */
    public function createAction($model)
    {
        $data = $this->getRequest()->getBody();
        $json = \json_decode($data);
        if($json) {
            $modelClassName = $this->getModelFullClassName($model);

            /** @var AbstractModel $newObject */
            $newObject = new $modelClassName;

            foreach($json as $attribute => $value) {
                $newObject->$attribute = $value;
            }

            $newObject->save();
            $this->sendJson($newObject, 201);
        } else {
            $this->app->halt(500, 'Invalid json data');
        }
    }

    /**
     * @param $model
     * @param $id
     * @throws \Exception
     */
    public function deleteAction($model, $id)
    {
        $modelClassName = $this->getModelFullClassName($model);

        /** @var AbstractModel $object */
        $object = $modelClassName::find($id);
        if($object) {
            $object->delete();
        } else {
            $this->send404();
        }
    }

    /**
     * @param $model
     * @param $id
     */
    public function updateAction($model, $id)
    {
        $data = $this->getRequest()->getBody();
        $json = \json_decode($data);

        if($json) {
            $modelClassName = $this->getModelFullClassName($model);

            /** @var AbstractModel $object */
            $object = $modelClassName::find($id);
            if($object) {
                foreach($json as $attribute => $value) {
                    $object->$attribute = $value;
                }

                $object->save();
                $this->sendJson($object);
            }else{
                $this->send404();
            }
        }else{
            $this->app->halt(500, 'Invalid json data');
        }
    }

    /**
     * @param string $model
     * @return string
     */
    private function getModelFullClassName($model)
    {
        return '\application\models\\' . ucfirst($model);
    }
}