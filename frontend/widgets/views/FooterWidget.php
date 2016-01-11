<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;

?>
<aside id="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-widget-title"><?=Yii::t('app', 'Карта сайта')?></h3>
                <ul id="menu-sitemap-menu" class="list-unstyled three_cols">
                    <li id="menu-item-633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-633">
                        <a href="<?=Url::home()?>" title="<?=Yii::t('app', 'Главная')?>"><?=Yii::t('app', 'Главная')?></a>
                    </li>
                    <li id="menu-item-634" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-634">
                        <a href="<?=Url::toRoute('page/o-nas')?>" title="<?=Yii::t('app', 'О нас')?>"><?=Yii::t('app', 'О нас')?></a>
                    </li>
                    <li id="menu-item-635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-635">
                        <a href="<?=Url::toRoute('/courses')?>" title="<?=Yii::t('app', 'Курсы')?>"><?=Yii::t('app', 'Курсы')?></a>
                    </li>
                    <li id="menu-item-636" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-636">
                        <a href="<?=Url::toRoute('calendar/index')?>" title="<?=Yii::t('app', 'График')?>"><?=Yii::t('app', 'График')?></a>
                    </li>
                    <li id="menu-item-637" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-637">
                        <a href="<?=Url::toRoute('test/index')?>" title="<?=Yii::t('app', 'Тесты')?>"><?=Yii::t('app', 'Тесты')?></a>
                    </li>
                    <li id="menu-item-638" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-638">
                        <a href="<?=Url::toRoute('library/index')?>" title="<?=Yii::t('app', 'Библиотека')?>"><?=Yii::t('app', 'Библиотека')?></a>
                    </li>
                    <li id="menu-item-639" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-639">
                        <a href="<?=Url::toRoute('blog/index')?>" title="<?=Yii::t('app', 'Блог')?>"><?=Yii::t('app', 'Блог')?></a>
                    </li>
                    <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-640">
                        <a href="<?=Url::toRoute('site/contact')?>" title="<?=Yii::t('app', 'Контакты')?>"><?=Yii::t('app', 'Контакты')?></a>
                    </li>
                    <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-640">
                        <a style="color: #e38d13 !important;" title="<?=Yii::t('app', 'Обучение')?>" href="<?=Url::toRoute('order/')?>"><?=Yii::t('app', 'Обучение')?></a>
                    </li>
                </ul>
                <h3 class="footer-widget-title"><?=Yii::t('app', 'Подписка')?></h3>
                <p><?=Yii::t('app', 'Подпишитесь - и будете всегда в курсе подследних новостей нашего сайта')?></p>
                <form role="form" id="subscribe_form" action="javascript:void(0);" class="form-horizontal" method="post" accept-charset="<?=Yii::$app->charset?>">
                <div class="input-group">
                    <input type="text" name="subscribe_email" value="" class="form-control" placeholder="<?=Yii::t('app', 'Email')?>">
                    <span class="input-group-btn">
                        <button class="btn btn-ar btn-primary" id="subscribe_button" type="button"><?=Yii::t('app', 'Подписаться')?></button>
                    </span>
                </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="footer-widget">
                    <h3 class="footer-widget-title"><?=Yii::t('app', 'Контактная информация')?></h3>
                    <ul class="media-list">
                        <li class="media">
                            <?=Yii::t('app', 'Адрес')?>: <strong>г. Киев, улица Бассейная 9, офис 4</strong>
                        </li>
                        <li class="media">
                            <?=Yii::t('app', 'Тел.')?>: <strong>(044) 235-16-63</strong>, <strong>(099) 972-81-17,</strong>
                        </li>
                        <li class="media">
                            <strong>(093) 594-43-89</strong>,   <strong>(098) 467-86-26</strong>
                        </li>
                        <li class="media">
                            <?=Yii::t('app', 'E-mail')?>: <a href="mailto:kschool94@gmail.com">kschool94@gmail.com</a>
                        </li>
                        <li class="media" style="font-size: 24px;">
                            <a href="" title="Vkontakte"><i class="fa fa-vk"></i></a>
                            <a href="" title="Odnoklassniki"><i class="fa fa-odnoklassniki"></i></a>
                            <a href="" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="footer-widget-title"><?=Yii::t('app', 'Пути подхода')?></h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5082.036771227522!2d30.5230494!3d50.4407582!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ceffa2a00705%3A0x42aaf6ef70924c8e!2z0LLRg9C7LiDQkdCw0YHQtdC50L3QsCwgOSwg0JrQuNGX0LI!5e0!3m2!1sru!2sua!4v1444821938043" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</aside>
