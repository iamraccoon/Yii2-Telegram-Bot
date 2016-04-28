<?php

namespace app\components\telegram;

use Yii;
use TelegramBot\Api\BotApi;
use yii\base\Configurable;
use yii\base\Exception;

/**
 * Class Bot
 * @package components\telegram
 */
class Bot extends BotApi implements Configurable
{
    /**
     * @var string
     */
    public $botToken;

    /**
     * @param $config
     * @throws Exception
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            Yii::configure($this, $config);
        }

        if (empty($this->botToken)) {
            throw new Exception('Bot token is required');
        }
        parent::__construct($this->botToken);
    }
} 