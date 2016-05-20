<?php

namespace app\actions;

use Yii;
use app\components\telegram\Message;
use yii\base\Action;

/**
 * Class StartAction
 * @package app\actions
 */
class StartAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        return Message::start(Yii::$app->bot->getChatId());
    }
}