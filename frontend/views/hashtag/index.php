<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HashtagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hashtags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Hashtag'), ['add'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'tag',
            [
                'attribute' => 'tag',
                'format' => 'raw',
                'value' => function($data){
                    return $data->tag;
                },
                'filter' => false,
            ],
//            'active',
//            'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
