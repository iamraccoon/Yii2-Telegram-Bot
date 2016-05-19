<?php

use yii\db\mysql\Schema;
use yii\db\Migration;

class m160506_125134_alterTableUser extends Migration
{
    private $tableName = 'User';

    public function up()
    {
        $this->addColumn($this->tableName, 'firstName', Schema::TYPE_STRING . '(300) NOT NULL');
        $this->addColumn($this->tableName, 'updateAt', Schema::TYPE_DATETIME . ' after createAt');

        $this->dropColumn($this->tableName, 'chatId');
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
