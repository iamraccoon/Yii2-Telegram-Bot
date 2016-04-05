<?php

use yii\db\mysql\Schema;
use yii\db\Migration;

class m160405_125134_addTableUser extends Migration
{
    private $tableName = 'User';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT="Пользователи" AUTO_INCREMENT=1';
        }

        $this->createTable($this->tableName, [
               'id' => Schema::TYPE_PK,
               'chatId' => Schema::TYPE_STRING . '(300) NOT NULL',
               'createAt' => Schema::TYPE_DATETIME
           ],
           $tableOptions
        );

        $this->createIndex('chatId', $this->tableName, 'chatId');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
