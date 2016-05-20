<?php

namespace app\components\telegram;

use app\components\phrase\Greeting;

/**
 * Class DefaultMessage
 * @package app\components\telegram
 */
class Message
{
    /**
     * @param $query
     * @return string
     */
    public static function chat($query)
    {
        return 'Все говорят «' . $query . '», а ты купи слона!';
    }

    /**
     * @param $userId
     * @return bool|string
     */
    public static function start($userId)
    {
        $greeting = new Greeting();
        $message = $greeting->getMessage($userId);

        return $message;
    }

    /**
     * @return string
     */
    public static function Help()
    {
        return 'Основная цель словесной «игры» — каждый раз, используя ответ собеседника, вновь предлагать ему купить слона';
    }
}