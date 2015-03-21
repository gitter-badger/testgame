<?php
namespace application\models;

use application\components\AbstractModel;

/**
 * Class Game
 * @package application\models
 * @property int $id
 * @property int $p1_id
 * @property int $p2_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $state
 * @property int $winner_id
 * @property string $uniq
 */
class Game extends  AbstractModel
{
    protected $table =  'game';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoots()
    {
        return $this->hasMany('Shoot');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany('Location');
    }
}