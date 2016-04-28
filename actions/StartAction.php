<?php

namespace app\actions;

use app\components\telegram\DefaultMessage;
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
        return DefaultMessage::Salute();
    }
}