<?php
namespace application\models;

use application\components\AbstractModel;

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