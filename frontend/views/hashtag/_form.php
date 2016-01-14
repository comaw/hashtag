<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $modelDescription app\models\HashtagDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hashtag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true])->hint(Yii::t('app', 'For example: #anyhashtag')) ?>

    <?= $form->field($modelDescription, 'description')->textarea(['maxlength' => true])->hint(Yii::t('app', 'Description and use the hashtag. Max 500 chars')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
