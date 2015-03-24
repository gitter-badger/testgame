<?php

use Phinx\Migration\AbstractMigration;

class AlterLocationPointToPointxPointy extends AbstractMigration
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
        $this->table('location')
            ->removeColumn('point')
            ->addColumn('x', 'integer', ['limit' => 10])
            ->addColumn('y', 'integer', ['limit' => 10])
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('location')
            ->removeColumn('x')
            ->removeColumn('y')
            ->addColumn('point', 'string')
            ->save();
    }
}