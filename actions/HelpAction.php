<?php

namespace app\actions;

use app\components\telegram\Message;
use yii\base\Action;

/**
 * Class HelpAction
 * @package app\actions
 */
class HelpAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        return Message::Help();
    }
}