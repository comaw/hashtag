<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

$parent = [];
$parent[0] = Yii::t('app', 'Parent');
$parent = ArrayHelper::merge($parent, ArrayHelper::map(Category::find()->all(), 'id', 'name'));
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    return $data->img ? '<img src="'.Category::getUrlImg($data->img).'" style="max-height: 60px;">' : '';
                },
                'filter' => false,
            ],
            'id',
            [
                'attribute' => 'parent',
                'format' => 'raw',
                'value' => function($data){
                    if(!$data->parent){
                        return Yii::t('app', 'Parent');
                    }
                    $current = Category::find()->where("id = :id", [':id' => $data->parent])->one();
                    return isset($current->name) ? $current->name : '';
                },
                'filter' => $parent,
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($data){
                    return Category::getType($data->type);
                },
                'filter' => Category::listType(),
            ],
            'name',
            'url',
            // 'title',
            // 'description',
            // 'content:ntext',
            // 'img',
             'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
