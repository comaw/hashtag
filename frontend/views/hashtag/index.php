<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HashtagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$page = Yii::$app->request->get('page');

$this->title = Yii::t('app', 'Hashtags') . ((isset($page) && $page > 1) ? Yii::t('app', ' page {page} ', ['page' => $page]) : '');
$this->registerMetaTag(['name' => 'description', 'content' => $this->title]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-index">
    <h1><?= Yii::t('app', 'Hashtags') ?></h1>
    <div class="pull-right"><a href="<?=Url::toRoute('site/rss')?>" title="RSS"><i class="fa fa-rss-square"></i> <?=Yii::t('app', 'RSS')?></a></div>
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
                    return "<a href='".Url::toRoute(['hashtag/view', 'tag' => $data->tagUrl])."' class='btn btn-info btn-sm' title='".Html::encode(Yii::t('app', 'Detail'))."'>".Yii::t('app', 'Detail')."</a>";
                },
                'filter' => false,
            ],
//            'active',
//            'created',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
