<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hashtag_description}}".
 *
 * @property string $id
 * @property string $hashtag
 * @property string $user
 * @property string $likes
 * @property string $description
 * @property string $created
 */
class HashtagDescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hashtag_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['description'], 'filter', 'filter' => 'strip_tags', 'skipOnArray' => true],
            [['hashtag', 'description'], 'required'],
            [['hashtag', 'user', 'likes'], 'integer'],
            [['created'], 'safe'],
            [['description'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hashtag' => Yii::t('app', 'Hashtag'),
            'user' => Yii::t('app', 'User'),
            'likes' => Yii::t('app', 'Like'),
            'description' => Yii::t('app', 'Description'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
}
