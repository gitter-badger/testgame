<?php
namespace application\models;

use application\components\AbstractModel;

/**
 * Class Player
 * @package application\models
 * @property string $uniq
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $hui
 * @property string $created_at
 * @property string $updated_at
 */
class Player extends AbstractModel
{
    protected $table = 'player';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games()
    {
        return $this->hasMany('Game');
    }
}