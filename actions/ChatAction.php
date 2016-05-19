<?php

namespace app\actions;

use app\models\User;
use TelegramBot\Api\Exception;
use yii;
use yii\base\Action;

class ChatAction extends Action
{
    private $message;

    private $userId;

    private $firstName;

    public function run()
    {
        $this->init();

        return $this->getMessage();
    }

    public function init()
    {
        $this->message = Yii::$app->bot->getMessage();
        $this->userId = Yii::$app->bot->getChatId();
        $this->firstName = Yii::$app->bot->getFirstName();
    }

    private function getMessage()
    {
        return 'Все говорят '. $this->message . ', а ты купи слона!';
    }
}