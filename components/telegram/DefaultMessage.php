<?php

namespace app\components\telegram;

/**
 * Class DefaultMessage
 * @package app\components\telegram
 */
class DefaultMessage
{
    /**
     * @return mixed
     */
    public static function Salute()
    {
        $salute = [
            'Ку!',
            'Салют, брат',
            'Hello',
            'Приветики',
        ];

        $key = array_rand($salute);

        return $salute[$key];
    }

    /**
     * @return string
     */
    public static function IamSick()
    {
        return 'Я болеть ((';
    }

    /**
     * @return string
     */
    public static function Help()
    {
        return 'Основная цель словесной «игры» — каждый раз, используя ответ собеседника, вновь предлагать ему купить слона';
    }
}