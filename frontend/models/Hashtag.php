<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hashtag}}".
 *
 * @property string $id
 * @property string $tag
 * @property string $tagUrl
 * @property integer $active
 * @property string $created
 */
class Hashtag extends \yii\db\ActiveRecord
{
    public $tagUrl;

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
                $this->tag = ltrim(trim($this->tag), '#');
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
        $this->tagUrl = trim($this->tag);
        $this->tag = '#'.trim($this->tag);

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
            [['created', 'tagUrl'], 'safe'],
            [['tag'], 'string', 'max' => 255],
            [['tag'], 'unique'],
            [['tag'], 'match', 'pattern' => '/^\#([0-9a-zA-ZА-Яа-яёЁ_\-\#]{2,500})$/Ui'],
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

    /**
     * @param $current
     * @param $relevantsList
     *
     * @return bool
     */
    public static function addRelevant($current, $relevantsList){
        if(!is_array($relevantsList) || sizeof($relevantsList) < 1){
            return false;
        }
        $current = (int)$current;
        if($current < 1){
            return false;
        }
        foreach($relevantsList AS $rel){
            $rel = trim($rel);
            $newTag = self::getOneTagByTag($rel);

            if(!$newTag){
                $newTag = self::add($rel);
                if(!$newTag){
                    continue;
                }
            }

            HashtagRelevant::add($current, $newTag->id);
        }

        return true;
    }

    /**
     * @param $tag
     *
     * @return array|null|\app\models\Hashtag
     */
    public static function getOneTagByTag($tag){
        $tag = ltrim($tag, '#');
        return self::find()->where("tag = :tag", [':tag' => $tag])->one();
    }

    /**
     * @param $tag
     *
     * @return Hashtag|null
     */
    public static function add($tag){
        $tag = '#'.ltrim($tag, '#');
        $model = new self();
        $model->tag = $tag;
        $model->active = 1;
        $model->created = date("Y-m-d H:i:s");
        if($model->validate()){
            $model->save();
            return $model;
        }
        return null;
    }
}
