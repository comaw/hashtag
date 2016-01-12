<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\helpers\Url;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>" class="no-js">
<head>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=<?=Yii::$app->charset?>">
    <title><?=Html::encode($this->title.' | '.Yii::$app->name)?></title>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <meta name="author" content="php-shaman">
    <meta name="generator" content="php-shaman">
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/css/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <header class="navbar" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"><?=Yii::t('app', 'Toggle navigation')?></span>
                    <i class="fa fa-cog"></i>
                </button>
                <a href="<?=Url::home()?>" class="navbar-brand navbar-brand-img" title="<?=Html::encode(Yii::$app->name)?>"><?=Yii::$app->name?></a>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
                <?php if(!Yii::$app->user->isGuest){ ?>
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown navbar-notification">
                        <?=\frontend\widgets\UserNotifications::widget()?>
                    </li>
                    <li class="dropdown navbar-notification">
                        <?=\frontend\widgets\UserMessages::widget()?>
                    </li>
                </ul>
                <?php } ?>
                <?=\frontend\widgets\UserMenu::widget()?>
            </nav>
        </div>
    </header>
    <div class="mainnav ">
        <div class="container">
            <a class="mainnav-toggle" data-toggle="collapse" data-target=".mainnav-collapse">
                <span class="sr-only"><?=Yii::t('app', 'Toggle navigation')?></span>
                <i class="fa fa-bars"></i>
            </a>
            <nav class="collapse mainnav-collapse" role="navigation">
                <form class="mainnav-form" action="<?=Url::toRoute('/search')?>" method="get" role="search" accept-charset="<?=Yii::$app->charset?>">
                    <input type="text" name="search_text" value="<?=(isset($_GET['search_text']) ? $_GET['search_text'] : '')?>" class="form-control input-md mainnav-search-query" placeholder="<?=Yii::t('app', 'Search')?>">
                    <button class="btn btn-sm mainnav-form-btn"><i class="fa fa-search"></i></button>
                </form>
                <?=\frontend\widgets\Menu::widget([
                    'url' => [
                        Yii::t('app', 'Home') => ['link' => Url::home(), 'fa' => 'fa-map-o'],
                        Yii::t('app', 'Hashtags') => ['item' => [
                            Yii::t('app', 'Wiki hashtags') => ['link' => Url::toRoute('hashtag/index'), 'fa' => 'fa-hashtag'],
                            Yii::t('app', 'Search hashtags') => ['link' => Url::toRoute('hashtag/search'), 'fa' => 'fa-search'],
                            Yii::t('app', 'Add hashtag') => ['link' => Url::toRoute('hashtag/add'), 'fa' => 'fa-pencil-square-o'],
                        ]],
                        Yii::t('app', 'Catalog') => ['item' => [
                            Yii::t('app', 'Users') => ['link' => Url::toRoute('сatalog/index'), 'fa' => 'fa-users'],
                            Yii::t('app', 'Interests') => ['link' => Url::toRoute('сatalog/interest'), 'fa' => 'fa-user-secret'],
                            Yii::t('app', 'Add user') => ['link' => Url::toRoute('сatalog/add'), 'fa' => 'fa-user-plus'],
                        ]],
                        Yii::t('app', 'Statistics') => ['item' => [
                            Yii::t('app', 'Popular hashtags') => ['link' => Url::toRoute('statistic/interest'), 'fa' => 'fa-star-half-o'],
                            Yii::t('app', 'Relevant hashtags') => ['link' => Url::toRoute('statistic/interest'), 'fa' => 'fa-sitemap'],
                            Yii::t('app', 'Popular topics') => ['link' => Url::toRoute('statistic/index'), 'fa' => 'fa-ticket'],
                            Yii::t('app', 'Popular users') => ['link' => Url::toRoute('statistic/add'), 'fa' => 'fa-user'],
                        ]],
                    ]
                ])?>
            </nav>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <?=$content?>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">© <?=date("Y")?> <a href="<?=Url::home()?>" title="<?=Html::encode(Yii::$app->name)?>"><?=Yii::$app->name?></a>. <?=Yii::t('app', 'All rights reserved')?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>