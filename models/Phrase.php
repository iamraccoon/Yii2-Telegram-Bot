<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Phrase".
 *
 * @property integer $id
 * @property integer $priority
 * @property string $phrase
 *
 * @property DialogPriority[] $dialogPriorities
 */
class Phrase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Phrase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['phrase'], 'required'],
            [['phrase'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'priority' => 'Priority',
            'phrase' => 'Phrase',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDialogPriorities()
    {
        return $this->hasMany(DialogPriority::className(), ['phraseId' => 'id']);
    }
}
