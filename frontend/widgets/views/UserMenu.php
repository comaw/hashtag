<?php
/**
 * powered by php-shaman
 * UserMenu.php 12.01.2016
 * Hashtag
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>
<ul class="nav navbar-nav navbar-right">
    <?php if(Yii::$app->user->isGuest){ ?>
        <li>
            <a href="javascript:;"><?=Yii::t('app', 'Support')?></a>
        </li>
        <li>
            <a href="<?=Url::toRoute('site/signup')?>" title="<?=Html::encode(Yii::t('app', 'Sign Up'))?>"><?=Yii::t('app', 'Sign Up')?></a>
        </li>

        <li>
            <a href="<?=Url::toRoute('site/login')?>" title="<?=Html::encode(Yii::t('app', 'Sign In'))?>"><?=Yii::t('app', 'Sign In')?></a>
        </li>
    <?php } ?>
    <?php if(!Yii::$app->user->isGuest){ ?>
        <li>
            <a href="javsacript:;">Projects</a>
        </li>
        <li>
            <a href="javascript:;">Support</a>
        </li>
        <li class="dropdown navbar-profile">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                <img src="/css/d/avatar-4-sm.jpg" class="navbar-profile-avatar" alt="">
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="">
                        <i class="fa fa-user"></i>
                        &nbsp;&nbsp;My Profile
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-dollar"></i>
                        &nbsp;&nbsp;Plans &amp; Billing
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-cogs"></i>
                        &nbsp;&nbsp;Settings
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="">
                        <i class="fa fa-sign-out"></i>
                        &nbsp;&nbsp;Logout
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>
</ul>
