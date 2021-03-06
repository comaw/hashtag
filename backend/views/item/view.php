<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created',
            [
                'attribute' => 'category',
                'format' => 'raw',
                'value' => isset($model->categories->name) ? $model->categories->name : '',
            ],
            'name',
            'url',
            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asCurrency($model->price),
            ],
            'field',
            'density',
            'absorption',
            'title',
            'description',
            'content:ntext',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => $model->img ? '<img src="'.\app\models\Item::getUrlImg($model->img).'" style="max-height: 60px;">' : '',
            ],
        ],
    ]) ?>

</div>
