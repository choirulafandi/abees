<?php

use Phinx\Migration\AbstractMigration;

class CreateLogsTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $users = $this->table('logs');
        $users->addColumn('number_id', 'string', array('limit' => 20))
              ->addColumn('description', 'string', array('limit' => 255, 'null' => true))
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('logs');
    }
}
