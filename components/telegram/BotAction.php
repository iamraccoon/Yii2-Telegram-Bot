<?php

namespace app\components\telegram;

use app\components\behaviors\Banned;
use app\models\Ban;
use yii;

/**
 * Class BotAction
 * @package app\components\telegram
 */
class BotAction
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    public $actionsList = ['start', 'help', 'chat'];

    /**
     * @var string
     */
    private $bannedAction = 'ban';

    /**
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $controller
     * @param $action
     * @return int|mixed
     */
    public function makeAnswer($controller, $action)
    {
        $this->action = $this->getActionName($action);

        return Yii::$app->runAction($controller . '/' . $this->action);
    }

    /**
     * @param $action
     * @return mixed
     */
    private function getActionName($action)
    {
        if ($this->isBanned()) {
            return $this->bannedAction;
        }

        if (in_array($action, $this->actionsList)) {
            return $action;
        }

        return Yii::$app->bot->methodDefault;
    }

    /**
     * @return bool
     */
    private function isBanned()
    {
        $checkBan = new Ban();

        return $checkBan->isBanned($this->userId);
    }
} 