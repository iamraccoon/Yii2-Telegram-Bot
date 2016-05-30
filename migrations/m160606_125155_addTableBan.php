<?php

use yii\db\mysql\Schema;
use yii\db\Migration;

class m160606_125155_addTableBan extends Migration
{
    private $tableName = 'Ban';
    private $tableNameUser = 'User';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT="Забаненые пользователи" AUTO_INCREMENT=1';
        }

        $this->createTable($this->tableName, [
            'id' => Schema::TYPE_PK,
            'userId' => Schema::TYPE_INTEGER,
            'createAt' => Schema::TYPE_DATETIME
        ],
            $tableOptions
        );

        $this->createIndex('userId', $this->tableName, 'userId');

        $this->addForeignKey(
            $this->tableName . '2' . $this->tableNameUser,
            $this->tableName,
            'userId',
            $this->tableNameUser,
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey($this->tableName. '2' .$this->tableNameUser, $this->tableName);

        $this->dropTable($this->tableName);
    }
}
