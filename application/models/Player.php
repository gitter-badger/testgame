<?php
namespace application\models;

use application\components\AbstractModel;

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