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
 * @property string $point
 * @property string $state
 */
class Location extends AbstractModel
{
    protected $table = 'location';

    public $timestamps = false;
}