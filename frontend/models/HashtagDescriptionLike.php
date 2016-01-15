<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hashtag_description_like}}".
 *
 * @property string $id
 * @property string $description
 * @property integer $user
 * @property string $created
 */
class HashtagDescriptionLike extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hashtag_description_like}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'user'], 'required'],
            [['description', 'user'], 'integer'],
            [['created'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'user' => Yii::t('app', 'User'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
}
