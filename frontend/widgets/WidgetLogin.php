<?php

namespace frontend\widgets;


class WidgetLogin extends \yii\bootstrap\Widget {

    public $returnUrl = null;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('widgetLogin', [
            'returnUrl' => $this->returnUrl
        ]);
    }
}