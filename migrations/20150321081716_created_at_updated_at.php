<?php

use Phinx\Migration\AbstractMigration;

class CreatedAtUpdatedAt extends AbstractMigration
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
        $this->table('player')
            ->addColumn('created_at', 'timestamp')
            ->addColumn('updated_at', 'timestamp')
            ->save();

        $this->table('game')
            ->addColumn('updated_at', 'timestamp')
            ->save();

        $this->table('shoot')
            ->removeColumn('datetime')
            ->addColumn('created_at', 'timestamp')
            ->addColumn('updated_at', 'timestamp')
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('player')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->save();

        $this->table('game')
            ->removeColumn('updated_at')
            ->save();

        $this->table('shoot')
            ->addColumn('datetime', 'datetime')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->save();
    }
}