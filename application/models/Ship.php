<?php
namespace application\models;

use application\components\AbstractModel;

/**
 * Class Ship
 * @package application\models
 * @property int $id
 * @property string $name
 * @property int $size
 */
class Ship extends AbstractModel
{
    public $timestamps = false;

    protected $table = 'ship';

    public static function getAllIndexed()
    {
        $shipModels = Ship::all();

        $shipsIndexed = [];

        foreach($shipModels as $object) {
            $shipsIndexed[$object->id] = $object;
        }


        return $shipsIndexed;
    }
}