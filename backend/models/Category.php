<?php

namespace app\models;

use Yii;
use common\UrlHelp;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $id
 * @property integer $parent
 * @property string $type
 * @property string $name
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $img
 * @property string $imageFile
 * @property string $created
 */
class Category extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
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
            [['parent'], 'integer'],
            [['type', 'content'], 'string'],
            [['name', 'url'], 'required'],
            [['created'], 'safe'],
            [['name', 'url', 'title', 'description', 'img'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['url'], 'unique'],
            [['type'], 'in', 'range' => ['products', 'manufacture']],
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
            'parent' => Yii::t('app', 'Parent'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'img' => Yii::t('app', 'Img'),
            'imageFile' => Yii::t('app', 'Img'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    public function upload($url)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@frontend/web/images/category/'). $url . '.' . $this->imageFile->extension);
            return $url . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }

    public static function getUrlImg($img){
        return UrlHelp::baseAdmin().'images/category/'.$img;
    }

    public static function delImg($img){
        return @unlink(Yii::getAlias('@frontend/web/images/category/').$img);
    }

    public static function listType(){
        return [
            'products' => Yii::t('app', 'Products'),
            'manufacture' => Yii::t('app', 'Manufacture'),
        ];
    }

    public static function getType($id){
        return isset(self::listType()[$id]) ? self::listType()[$id] : null;
    }

    public static function getAll(){
        return self::find()->orderBy("name asc")->all();
    }

    public static function getAllBySelect(){
        return ArrayHelper::map(self::getAll(), 'id', 'name');
    }
}
