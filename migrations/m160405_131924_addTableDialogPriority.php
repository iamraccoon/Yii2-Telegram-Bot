<?php

use yii\db\mysql\Schema;
use yii\db\Migration;

class m160405_131924_addTableDialogPriority extends Migration
{
    private $tableName = 'DialogPriority';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT="Приоритеты фраз" AUTO_INCREMENT=1';
        }

        $this->createTable($this->tableName, [
               'id'       => Schema::TYPE_PK,
               'phraseId'   => Schema::TYPE_INTEGER,
               'userId'   => Schema::TYPE_INTEGER,
               'basePriority' => Schema::TYPE_SMALLINT,
               'currentPriority' => Schema::TYPE_SMALLINT,
           ],
           $tableOptions
        );

        $this->createIndex('phraseId', $this->tableName, 'phraseId');
        $this->createIndex('userId', $this->tableName, 'userId');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
