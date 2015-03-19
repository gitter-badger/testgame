<?php

use Phinx\Migration\AbstractMigration;

class IntialMigration extends AbstractMigration
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
        $user = $this->table('player');
        $user->addColumn('name', 'string')
            ->addColumn('password', 'string')
            ->create();

        $game = $this->table('game');
        $game->addColumn('created_at', 'datetime')
            ->addColumn('p1_id', 'integer')
            ->addColumn('p2_id', 'integer')
            ->addColumn('state', 'enum', ['values' => ['active', 'finished'] ])
            ->create();

        $location = $this->table('location');
        $location->addColumn('game_id', 'integer')
            ->addColumn('player_id', 'integer')
            ->addColumn('ship_id', 'integer')
            ->addColumn('orientation', 'enum', ['values' => ['horizontal', 'vertical']])
            ->addColumn('point', 'string')
            ->addColumn('state', 'enum', ['values' => ['full', 'injured', 'dead']])
            ->create();

        $ship = $this->table('ship');
        $ship->addColumn('name', 'string')
            ->addColumn('size', 'integer')
            ->create();

        $shoot = $this->table('shoot');
        $shoot->addColumn('game_id', 'integer')
            ->addColumn('player_id', 'integer')
            ->addColumn('datetime', 'datetime')
            ->addColumn('point', 'string')
            ->addColumn('result', 'enum', ['values' => ['succsess', 'failure']])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('player');
        $this->dropTable('game');
        $this->dropTable('location');
        $this->dropTable('ship');
        $this->dropTable('shoot');
    }
}