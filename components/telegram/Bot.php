<?php

namespace app\components\telegram;

use yii;
use TelegramBot\Api\BotApi;
use yii\base\Configurable;
use yii\helpers\Json;
use TelegramBot\Api\Exception;

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
     * @var string
     */
    public $controllerName;

    /**
     * @var string
     */
    public $methodDefault;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $request;

    /**
     * @var int
     */
    private $chatId;

    /**
     * @var string
     */
    private $message;

    /**
     * @throws Exception
     */
    public function init()
    {
        $this->getRequest();
        $this->getMethodName();
        $this->getMessage();
    }

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

    /**
     * @throws Exception
     */
    private function getRequest()
    {
        $input = file_get_contents("php://input");
        $this->request = Json::decode($input);

        if (!isset($this->request['message']['text'])) {
            throw new Exception('Indefinite text in request');
        }
    }

    /**
     * @return string
     */
    private function getMethodName()
    {
        if ($this->method) {
            return $this->method;
        }

        $this->method = $this->methodDefault;
        if (isset($this->request['message']['text']) and (substr($this->request['message']['text'], 0, 1) === '/')) {
            $this->method = substr($this->request['message']['text'], 1);
        }

        return $this->method;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        if (isset($this->request['message']['text'])) {
            $this->message = $this->request['message']['text'];
        }

        return $this->message;
    }

    /**
     * @return int
     */
    public function getChatId()
    {
        if ($this->chatId) {
            return $this->chatId;
        }

        if (isset($this->request['message']['from']['id'])) {
            $this->chatId = $this->request['message']['from']['id'];
        }

        return $this->chatId;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        if (isset($this->request['message']['from']['first_name'])) {
            return $this->request['message']['from']['first_name'];
        }

        return '';
    }

    /**
     * @return int|mixed
     */
    public function makeAnswer()
    {
        $botAction = new BotAction();
        $answer = $botAction->makeAnswer($this->controllerName, $this->getMethodName());

        return $answer;
    }
}