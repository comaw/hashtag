<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $video
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $created
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->title = $this->title ? $this->title : $this->name;
                $this->description = $this->description ? $this->description : $this->name;
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'title', 'description'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['name', 'url', 'video'], 'required'],
            [['content'], 'string'],
            [['created'], 'safe'],
            [['name', 'url', 'video', 'title', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'video' => Yii::t('app', 'Video'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
}
