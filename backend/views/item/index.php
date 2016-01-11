<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function($data){
                    return $data->img ? '<img src="'.\app\models\Item::getUrlImg($data->img).'" style="max-height: 60px;">' : '';
                },
                'filter' => false,
            ],
            'id',
            [
                'attribute' => 'category',
                'format' => 'raw',
                'value' => function($data){
                    return isset($data->categories->name) ? $data->categories->name : Yii::t('app', 'Not fount category');
                },
                'filter' => Category::getAllBySelect(),
            ],
            'name',
            'url',
            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' => function($data){
                    return Yii::$app->formatter->asCurrency($data->price);
                },
            ],
            // 'field',
            // 'density',
            // 'absorption',
            // 'img',
            // 'title',
            // 'description',
            // 'content:ntext',
             'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
