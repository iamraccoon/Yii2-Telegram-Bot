<?php

namespace app\actions;

use yii;
use yii\base\Action;

class ChatAction extends Action
{
    private $message;

    public function run()
    {
        $this->init();

        return $this->getMessage();
    }

    public function init()
    {
        $this->message = Yii::$app->bot->getMessage();
    }

    private function getMessage()
    {
        return 'Все говорят '. $this->message . ', а ты купи слона!';
    }
}