<?php
/**
 * powered by php-shaman
 * rss.php 31.01.2016
 * Hashtag
 */

/* @var $model \app\models\Hashtag */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?='<?xml version="1.0" encoding="utf-8"?>'?>
<rss version="2.0">
    <channel>
        <title><?=Html::encode(Yii::$app->name)?></title>
        <link><?=Url::toRoute('/hashtag', true)?></link>
        <description>
            <?=Yii::t('app', 'Сервис по работе с хэштегами')?>
        </description>
        <lastBuildDate><?=date("d M Y H:i:s O")?></lastBuildDate>
        <?php foreach($models AS $model){ ?>
        <item>
            <title><?=Html::encode($model->tag)?></title>
            <link><?=Url::toRoute(['hashtag/view', 'tag' => $model->tag], true)?></link>
            <?php if(sizeof($model->descriptions) > 0){foreach($model->descriptions AS $description){ ?>
                <description><?=isset($description->description) ? Html::encode($description->description) : ''?></description>
            <?php break; }} ?>
            <pubDate><?=date("d M Y H:i:s O", strtotime($model->created))?></pubDate>
        </item>
        <?php } ?>
    </channel>
</rss>