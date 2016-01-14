<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $description app\models\HashtagDescription */
/* @var $newDescription app\models\HashtagDescription */

$this->title = $model->tag;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hashtags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-view">
    <h1><?=Yii::t('app', 'Hashtag')?>: <?=$this->title?></h1>
    <p><time datetime="<?=$model->created?>"><?=date("d/m/Y", strtotime($model->created))?></time></p>
    <div class="row">
        <div class="col-xs-12">
            <h3><?=Yii::t('app', 'Значения')?>:</h3>
            <?php if(sizeof($model->descriptions) > 0){foreach($model->descriptions AS $description){ ?>
            <blockquote><?=isset($description->description) ? $description->description : ''?><a class="label label-primary pull-right"><?=Yii::t('app', 'Like')?> (<?=(int)$description->like?>)</a></blockquote>
            <hr>
            <?php }} ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h3><?=Yii::t('app', 'Добавить свое описание')?>:</h3>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($newDescription, 'description')->textarea(['maxlength' => true])->hint(Yii::t('app', 'Description and use the hashtag. Max 500 chars')) ?>

            <div class="form-group">
                <?= Html::submitButton($newDescription->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $newDescription->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
