<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$current = Category::find()->where("id = :id", [':id' => $model->parent])->one();
?>
<div class="category-view">

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
            [
                'attribute' => 'parent',
                'format' => 'raw',
                'value' => isset($current->name) ? $current->name : ($model->parent == 0 ? Yii::t('app', 'Parent') : ''),
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => Category::getType($model->type),
            ],
            'created',
            'name',
            'url',
            'title',
            'description',
            'content:ntext',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => $model->img ? '<img src="'.Category::getUrlImg($model->img).'" style="max-height: 150px;">' : '',
            ],
        ],
    ]) ?>

</div>
