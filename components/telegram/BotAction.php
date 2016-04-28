<?php

namespace app\components\telegram;

use yii;

/**
 * Class BotAction
 * @package app\components\telegram
 */
class BotAction
{
    /**
     * @param $controller
     * @param $action
     *
     * @return int|mixed
     */
    public static function makeAnswer($controller, $action)
    {
        return Yii::$app->runAction($controller . '/' . $action);
    }
} 