<?php

namespace frontend\widgets;


use app\models\Carousel;

class CarouselWidget extends \yii\bootstrap\Widget
{
    public $model;

    public function init(){
        parent::init();
    }

    public function run(){
        $model = Carousel::find()->orderBy("id asc")->all();
        return $this->render('CarouselWidget', [
            'model' => $model
        ]);
    }
}