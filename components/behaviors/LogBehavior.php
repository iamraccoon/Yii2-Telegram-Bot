<?php

namespace app\components\behaviors;

use app\models\Log;
use Yii;
use yii\base\Behavior;
use yii\db\Exception;
use yii\db\Expression;
use yii\web\Controller;

/**
 * Class LogBehavior
 * @package app\components\behaviors
 */
class LogBehavior extends Behavior
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $createAt;

    /**
     * @var array
     */
    public $actions;

    /**
     * @var string
     */
    public $currentAction;

    /**
     * @return array
     */
    public function events()
    {
        return [
            Controller::EVENT_AFTER_ACTION => 'afterAction',
        ];
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function afterAction()
    {
        if ($this->validate()) {
            $this->init();
            $this->saveLog();
        }

        return true;
    }

    /**
     * @throws Exception
     */
    private function saveLog()
    {
        $log = new Log();
        $log->setAttributes([
            'userId' => $this->userId,
            'message' => $this->message,
            'createAt' => $this->createAt,
        ]);

        if (!$log->validate() or !$log->save(false)) {
            throw new Exception('Log creation error');
        }
    }

    /**
     * Initializes the object
     */
    public function init()
    {
        $this->userId = Yii::$app->bot->getChatId();
        $this->message = Yii::$app->bot->getMessage();
        $this->createAt = new Expression('NOW()');
    }

    /**
     * @return bool
     */
    private function validate()
    {
        if (in_array($this->currentAction, $this->actions)) {
            return true;
        }

        return false;
    }
}