<?php
namespace application\models;

use application\components\AbstractModel;


/**
 * Class Location
 * @package application\models
 * @property int $id
 * @property int $game_id
 * @property int $player_id
 * @property int $ship_id
 * @property string $orientation
 * @property int $x
 * @property int $y
 * @property string $state
 */
class Location extends AbstractModel
{
    protected $table = 'location';

    public $timestamps = false;

    public function validate()
    {
        $ship = Ship::find($this->ship_id);

        return $ship && $this->validateCoordinates();
    }

    public function validateCoordinates()
    {
        if (array_diff([$this->x, $this->y], range(1,10))) { return false; }

        $shipsIndexed = Ship::getAllIndexed();
        $size = $shipsIndexed[$this->ship_id]->size;

        switch($this->orientation) {
            case 'h' :
                if ($this->x + $size > 11) { return false; }
                break;
            case 'v' :
                if ($this->y + $size > 11) { return false; }
                break;
        }

        return true;
    }
}