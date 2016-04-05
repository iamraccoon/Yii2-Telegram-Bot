<?php

use yii\db\mysql\Schema;
use yii\db\Migration;

class m160405_101730_addTablePhrase extends Migration
{
    private $tableName = 'Phrase';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT="Фразы" AUTO_INCREMENT=1';
        }

        $this->createTable($this->tableName, [
               'id'       => Schema::TYPE_PK,
               'priority' => Schema::TYPE_SMALLINT . '(2) NOT NULL DEFAULT 5',
               'phrase'   => Schema::TYPE_STRING . '(100) NOT NULL',
           ],
           $tableOptions
        );

        $this->createIndex('priority', $this->tableName, 'priority');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
