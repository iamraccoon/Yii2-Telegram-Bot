<?php

namespace app\components\phrase;

use Yii;
use app\models\DialogPriority;
use app\models\Phrase;

/**
 * Class GeneratePhrases
 * @package app\components\phrase
 */
class GeneratePhrases
{
    /**
     * @var int
     */
    private $basePriority = 10;

    /**
     * @param $userId
     */
    public function generate($userId)
    {
        $sql = '';
        $phrases = Phrase::find()->asArray()->all();

        foreach ($phrases as $k => $val) {
            $sql .= "
                INSERT INTO  `" . DialogPriority::tableName() . "` (`phraseId`, `userId`, `basePriority`, `currentPriority`)
                VALUES ('" . $val['id'] . "',  '" . $userId . "',  '" . $this->basePriority . "', '" . $this->getNewPriority($val['priority']) . "');
            ";
        }

        Yii::$app->getDb()->createCommand($sql)->execute();
    }

    /**
     * @param $priority
     *
     * @return mixed
     */
    private function getNewPriority($priority)
    {
        return $priority + rand(-10, 10);
    }
} 