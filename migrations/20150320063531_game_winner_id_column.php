<?php

use Phinx\Migration\AbstractMigration;

class GameWinnerIdColumn extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('game')->addColumn('winner_id', 'integer')->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('game')->removeColumn('winner_id')->save();
    }
}