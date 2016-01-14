<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $modelDescription app\models\HashtagDescription */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hashtag',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hashtags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="hashtag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDescription' => $modelDescription,
    ]) ?>

</div>
