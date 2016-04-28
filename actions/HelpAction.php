<?php

namespace app\actions;

use app\components\telegram\DefaultMessage;
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
        return DefaultMessage::Help();
    }
}