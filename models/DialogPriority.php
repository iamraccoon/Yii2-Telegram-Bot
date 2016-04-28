<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DialogPriority".
 *
 * @property integer $id
 * @property integer $phraseId
 * @property integer $userId
 * @property integer $basePriority
 * @property integer $currentPriority
 *
 * @property Phrase $phrase
 * @property User $user
 */
class DialogPriority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DialogPriority';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phraseId', 'userId', 'basePriority', 'currentPriority'], 'integer'],
            [['phraseId'], 'exist', 'skipOnError' => true, 'targetClass' => Phrase::className(), 'targetAttribute' => ['phraseId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phraseId' => 'Phrase ID',
            'userId' => 'User ID',
            'basePriority' => 'Base Priority',
            'currentPriority' => 'Current Priority',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhrase()
    {
        return $this->hasOne(Phrase::className(), ['id' => 'phraseId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
