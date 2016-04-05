<?php

use yii\db\Migration;

class m160405_133855_addFKDialogPriority2User extends Migration
{
    private $tableNameUser = 'User';
    private $tableNameDialog = 'DialogPriority';

    public function up()
    {
        $this->addForeignKey(
           $this->tableNameDialog . '2' .$this->tableNameUser,
           $this->tableNameDialog,
           'userId',
           $this->tableNameUser,
           'id',
           'CASCADE',
           'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey($this->tableNameDialog . '2' .$this->tableNameUser, $this->tableNameDialog);
    }
}
