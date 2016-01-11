<?php

namespace app\models;

use common\UrlHelp;
use Yii;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property string $id
 * @property string $category
 * @property string $name
 * @property string $url
 * @property string $price
 * @property string $field
 * @property integer $density
 * @property string $absorption
 * @property string $compressive
 * @property string $img
 * @property string $imageFile
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $created
 */
class Item extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item}}';
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
            [['category', 'name', 'url'], 'required'],
            [['category', 'density', 'compressive'], 'integer'],
            [['price', 'absorption'], 'number'],
            [['content'], 'string'],
            [['created'], 'safe'],
            [['name', 'url', 'title', 'description', 'field', 'img'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['url'], 'unique'],
            [['imageFile'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'price' => Yii::t('app', 'Price'),
            'field' => Yii::t('app', 'Field'),
            'density' => Yii::t('app', 'Density'),
            'absorption' => Yii::t('app', 'Absorption'),
            'compressive' => Yii::t('app', 'Compressive'),
            'img' => Yii::t('app', 'Img'),
            'imageFile' => Yii::t('app', 'Img'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    public function upload($url)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@frontend/web/images/item/'). $url . '.' . $this->imageFile->extension);
            return $url . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }

    public static function getUrlImg($img){
        return UrlHelp::baseAdmin().'images/item/'.$img;
    }

    public static function delImg($img){
        return @unlink(Yii::getAlias('@frontend/web/images/item/').$img);
    }

    public static function toTen($num){
        return str_replace(',', '.', $num);
    }
}
