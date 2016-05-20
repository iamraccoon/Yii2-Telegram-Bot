<?php

namespace app\actions;

use app\components\telegram\Message;
use yii;
use yii\base\Action;

/**
 * Class ChatAction
 * @package app\actions
 */
class ChatAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        return Message::chat(Yii::$app->bot->getMessage());
    }
}