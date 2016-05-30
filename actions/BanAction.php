<?php

namespace app\actions;

use app\components\telegram\Message;
use yii\base\Action;

/**
 * Class HelpAction
 * @package app\actions
 */
class BanAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        return Message::ban();
    }
}