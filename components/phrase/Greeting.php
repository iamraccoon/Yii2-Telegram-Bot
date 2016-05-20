<?php

namespace app\components\phrase;

use app\models\DialogPriority;
use app\models\Phrase;
use yii\base\Exception;

/**
 * Class Greeting
 * @package app\components\phrase
 */
class Greeting
{
    /**
     * @param $userId
     * @return bool|string
     * @throws Exception
     */
    public function getMessage($userId)
    {
        list($id, $phraseId) = $this->getWithMaxPriority($userId);
        $this->updateCurrentPriority($id);

        $message = $this->getPhraseById($phraseId);

        return $message;
    }

    /**
     * @param $id
     * @return bool|string
     * @throws Exception
     */
    private function getPhraseById($id)
    {
        if (!($phrase = Phrase::find()->select('phrase')->where('id=:id', [':id' => $id])->scalar())) {
            throw new Exception('Could not find phrase with id ' . $id);
        }

        return $phrase;
    }

    /**
     * @param $id
     * @throws Exception
     */
    private function updateCurrentPriority($id)
    {
        if (!($dialog = DialogPriority::findOne($id))) {
            throw new Exception('Could not find phrases with id ' . $id);
        }

        $dialog->currentPriority -= $dialog->basePriority * 2;
        $dialog->save();
    }

    /**
     * @param $userId
     * @return array
     * @throws Exception
     */
    private function getWithMaxPriority($userId)
    {
        if (!($dialog = DialogPriority::find()->select('id, phraseId')->where('userId=:userId', [':userId' => $userId])->orderBy(['currentPriority' => SORT_DESC])->asArray()->one())) {
            throw new Exception('Could not find phrases with userId ' . $userId);
        }

        return [$dialog['id'], $dialog['phraseId']];
    }
} 