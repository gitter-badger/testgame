<?php

use Phinx\Migration\AbstractMigration;

class GameStateExtend extends AbstractMigration
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
        $this->table('game')
            ->changeColumn('state', 'enum', ['values' => ['active', 'new', 'finished']])
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('game')
            ->changeColumn('state', 'enum', ['values' => ['active', 'finished']])
            ->save();
    }
}