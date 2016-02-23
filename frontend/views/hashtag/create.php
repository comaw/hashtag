<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $modelDescription app\models\HashtagDescription */

$this->title = Yii::t('app', 'Create Hashtag');
$this->registerMetaTag(['name' => 'description', 'content' => $this->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hashtags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDescription' => $modelDescription,
    ]) ?>

</div>
