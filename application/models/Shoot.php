<?php
namespace application\models;

use application\components\AbstractModel;

/**
 * Class Shoot
 * @package application\models
 * @property int $id
 * @property int $game_id
 * @property int $player_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $point
 * @property string $result
 */
class Shoot extends AbstractModel {
    protected $table = 'shoot';
}