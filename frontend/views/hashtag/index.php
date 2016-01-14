<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
            [
                'label' => Yii::t('app', 'Description'),
                'format' => 'raw',
                'value' => function($data){
                    return isset($data->description->description) ? $data->description->description : '';
                },
                'filter' => false,
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function($data){
                    return "<a href='".Url::toRoute(['hashtag/view', 'tag' => $data->tag])."' class='btn btn-info btn-sm' title='".Html::encode(Yii::t('app', 'Detail'))."'>".Yii::t('app', 'Detail')."</a>";
                },
                'filter' => false,
            ],
//            'active',
//            'created',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
