<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hashtag}}".
 *
 * @property string $id
 * @property string $tag
 * @property integer $active
 * @property string $created
 */
class Hashtag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hashtag}}';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->tag = ltrim($this->tag, '#');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();
        $this->tag = '#'.$this->tag;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['tag'], 'filter', 'filter' => 'strip_tags', 'skipOnArray' => true],
            [['tag'], 'required'],
            [['active'], 'integer'],
            [['created'], 'safe'],
            [['tag'], 'string', 'max' => 255],
            [['tag'], 'unique'],
            [['tag'], 'match', 'pattern' => '/^#([^\s#]{2,500})$/Ui'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tag' => Yii::t('app', 'Tag'),
            'active' => Yii::t('app', 'Active'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    public function getDescription() {
        return $this->hasOne(HashtagDescription::className(), ['hashtag' => 'id'])->orderBy('likes desc, id desc');
    }

    public function getDescriptions() {
        return $this->hasMany(HashtagDescription::className(), ['hashtag' => 'id'])->orderBy('likes desc, id desc');
    }
}
