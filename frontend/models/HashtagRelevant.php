<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hashtag_relevant}}".
 *
 * @property string $id
 * @property string $hashtag
 * @property string $relevant
 */
class HashtagRelevant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hashtag_relevant}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hashtag', 'relevant'], 'required'],
            [['hashtag', 'relevant'], 'integer']
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
            'relevant' => Yii::t('app', 'Relevant'),
        ];
    }

    /**
     * @param $tag
     * @param $rel
     *
     * @return HashtagRelevant|array|null
     */
    public static function add($tag, $rel){
        $model = self::getByTagRel($tag, $rel);
        if($model){
            return $model;
        }
        $model = new self();
        $model->hashtag = $tag;
        $model->relevant = $rel;
        if($model->validate()){
            $model->save();
            return $model;
        }
        return null;
    }

    /**
     * @param $tag
     * @param $rel
     *
     * @return array|null|\app\models\HashtagRelevant
     */
    public static function getByTagRel($tag, $rel){
        return self::find()->where("hashtag = :hashtag AND relevant = :relevant", [
            ':hashtag' => $tag,
            ':relevant' => $rel,
        ])->one();
    }
}
