<?php

use yii\db\Migration;

class m160405_134013_addFKDialogPriority2Phrase extends Migration
{
    private $tableNamePhrase = 'Phrase';
    private $tableNameDialog = 'DialogPriority';

    public function up()
    {
        $this->addForeignKey(
           $this->tableNameDialog . '2' .$this->tableNamePhrase,
           $this->tableNameDialog,
           'phraseId',
           $this->tableNamePhrase,
           'id',
           'CASCADE',
           'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey($this->tableNameDialog . '2' .$this->tableNamePhrase, $this->tableNameDialog);
    }
}
