<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $tag app\models\Hashtag */
/* @var $searchModel app\models\HashtagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Search hashtags');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hashtags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-3 text-right">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => "form-inline",
            ],
        ]); ?>
            <div class="form-group">
                <input type="text" name="tagsearch" value="<?=Yii::$app->request->post('tagsearch')?>" class="form-control" id="tagsearch" placeholder="<?=Yii::t('app', 'For example: #anyhashtag')?>">
            </div>
        </div>
        <div class="col-xs-3">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-warning']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <br>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php if(sizeof($tags) > 0){ ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th><?=Yii::t('app', 'Hashtag')?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($tags AS $num => $tag){ ?>
                <tr>
                    <td><?=$num + 1?></td>
                    <td><?=$tag->tag?></td>
                    <td><?="<a href='".Url::toRoute(['hashtag/view', 'tag' => $tag->tag])."' class='btn btn-info btn-sm' title='".Html::encode(Yii::t('app', 'Detail'))."'>".Yii::t('app', 'Detail')."</a>"?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <p class="text-danger"><?=Yii::t('app', 'Ничего не найдено')?></p>
    <?php } ?>
</div>
