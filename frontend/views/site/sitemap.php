<?php
/**
 * powered by php-shaman
 * sitemap.php 29.01.2016
 * Hashtag
 */

/* @var $model \app\models\Hashtag */

use yii\helpers\Url;

?>
<?='<?xml version="1.0" encoding="UTF-8"?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?=Url::home(true)?></loc>
        <lastmod><?=date("Y-m-d")?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc><?=Url::toRoute(['/hashtag'], true)?></loc>
        <lastmod><?=date("Y-m-d")?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <?php for($i = 2; $i <= 4; $i++){ ?>
        <url>
            <loc><?=Url::toRoute(['/hashtag', 'page' => $i], true)?></loc>
            <lastmod><?=date("Y-m-d")?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <?php } ?>
    <?php foreach($models AS $model){ ?>
        <url>
            <loc><?=Url::toRoute(['hashtag/view', 'tag' => $model->tag], true)?></loc>
            <lastmod><?=date("Y-m-d", strtotime($model->created))?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php } ?>
</urlset>
