<?php

namespace app\components\behaviors;

use yii\base\Behavior;
use yii\web\Controller;

/**
 * Class LogBehavior
 * @package app\components\behaviors
 */
class LogBehavior extends Behavior
{
    /**
     * @return array
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    public function beforeAction()
    {
        
    }
}