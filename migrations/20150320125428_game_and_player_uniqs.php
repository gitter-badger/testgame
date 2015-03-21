<?php

use Phinx\Migration\AbstractMigration;

class GameAndPlayerUniqs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('game')->addColumn('uniq', 'string')->save();
        $this->table('player')->addColumn('uniq', 'string')->save();
    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('game')->removeColumn('uniq')->save();
        $this->table('player')->removeColumn('uniq')->save();
    }
}