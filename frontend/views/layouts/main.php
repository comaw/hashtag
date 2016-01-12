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
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown navbar-notification">
                        <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell navbar-notification-icon"></i>
                            <span class="visible-xs-inline">&nbsp;Notifications</span>
                            <b class="badge badge-primary">3</b>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">&nbsp;Notifications</div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 225px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 225px;">
                                    <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="notification">
                                        <span class="notification-icon"><i class="fa fa-cloud-upload text-primary"></i></span>
                                        <span class="notification-title">Notification Title</span>
                                        <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                                        <span class="notification-time">20 minutes ago</span>
                                    </a>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div> <!-- / .notification-list -->
                            <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="notification-link">View All Notifications</a>
                        </div>
                    </li>
                    <li class="dropdown navbar-notification">
                        <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope navbar-notification-icon"></i>
                            <span class="visible-xs-inline">&nbsp;Messages</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">Messages</div>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 225px;"><div class="notification-list" style="overflow: hidden; width: auto; height: 225px;">

                                    <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="notification">
                                        <div class="notification-icon"><img src="./Analytics Dashboard · MVP Ready_files/avatar-3-md.jpg" alt=""></div>
                                        <div class="notification-title">New Message</div>
                                        <div class="notification-description">Praesent dictum nisl non est sagittis luctus.</div>
                                        <div class="notification-time">20 minutes ago</div>
                                    </a>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div> <!-- / .notification-list -->
                            <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/page-notifications.html" class="notification-link">View All Messages</a>
                        </div>
                    </li>
                </ul>
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
                <form class="mainnav-form" role="search">
                    <input type="text" class="form-control input-md mainnav-search-query" placeholder="Search">
                    <button class="btn btn-sm mainnav-form-btn"><i class="fa fa-search"></i></button>
                </form>
                <ul class="mainnav-menu">
                    <li class="dropdown active is-open">
                        <a href="./Analytics Dashboard · MVP Ready_files/Analytics Dashboard · MVP Ready.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            Dashboards
                            <i class="mainnav-caret"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="./Analytics Dashboard · MVP Ready_files/Analytics Dashboard · MVP Ready.html">
                                    <i class="fa fa-dashboard dropdown-icon "></i>
                                    Analytics Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/dashboard-2.html">
                                    <i class="fa fa-dashboard dropdown-icon "></i>
                                    Sidebar Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/dashboard-3.html">
                                    <i class="fa fa-dashboard dropdown-icon "></i>
                                    Reports Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown ">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            Components
                            <i class="mainnav-caret"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/components-tabs.html">
                                    <i class="fa fa-bars dropdown-icon "></i>
                                    Tabs &amp; Accordions
                                </a>
                            </li>
                            <li>
                                <a href="https://jumpstartthemes.com/demo/v/2.1.0/templates/admin/components-popups.html">
                                    <i class="fa fa-calendar-o dropdown-icon "></i>
                                    Popups &amp; Alerts
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
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
        <p class="pull-left">© <?=date("Y")?> <a href="<?=Url::home()?>" title="<?=Html::encode(Yii::$app->name)?>"><?=Yii::$app->name?></a>.</p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>