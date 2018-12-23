<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "likee".
 *
 * @property int $id
 * @property int $user_id
 * @property int $website_id
 *
 * @property User $user
 * @property Website $website
 */
class Likee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'likee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'website_id'], 'required'],
            [['user_id', 'website_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['website_id'], 'exist', 'skipOnError' => true, 'targetClass' => Website::className(), 'targetAttribute' => ['website_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'website_id' => Yii::t('app', 'Website ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebsite()
    {
        return $this->hasOne(Website::className(), ['id' => 'website_id']);
    }
}
