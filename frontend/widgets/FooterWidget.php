<?php
namespace frontend\widgets;


class FooterWidget extends \yii\bootstrap\Widget
{
    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('FooterWidget', [

        ]);
    }
}