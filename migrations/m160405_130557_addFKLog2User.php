<?php

use yii\db\Migration;

class m160405_130557_addFKLog2User extends Migration
{
    private $tableNameLog = 'Log';
    private $tableNameUser = 'User';

    public function up()
    {
        $this->addForeignKey(
           $this->tableNameLog . '2' .$this->tableNameUser,
           $this->tableNameLog,
           'userId',
           $this->tableNameUser,
           'id',
           'CASCADE',
           'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey($this->tableNameLog . '2' .$this->tableNameUser, $this->tableNameLog);
    }
}
