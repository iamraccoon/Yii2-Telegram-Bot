<?php

namespace app\controllers;

use yii;
use yii\base\Controller;
use app\actions\StartAction;
use app\actions\HelpAction;
use app\actions\ChatAction;

class MainController extends Controller
{
    public function actions()
    {
        return [
            'start' => ['class' => StartAction::className()],
            'help' => ['class' => HelpAction::className()],
            'chat' => ['class' => ChatAction::className()]
        ];
    }

    public function actionIndex()
    {
        $bot = Yii::$app->bot;
        $bot->init();

        $message = $bot->makeAnswer();
        $bot->sendMessage($bot->getChatId(), $message);
    }
}