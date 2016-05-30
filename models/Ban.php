<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ban".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $createAt
 *
 * @property User $user
 */
class Ban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Ban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId'], 'integer'],
            [['createAt'], 'safe'],
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
            'userId' => 'User ID',
            'createAt' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @param $userId
     * @return bool
     */
    public function isBanned($userId)
    {
        if (($ban = Ban::find()->select('id')->where('userId=:userId', [':userId' => $userId])->one())) {
            return true;
        }

        return false;
    }
}
