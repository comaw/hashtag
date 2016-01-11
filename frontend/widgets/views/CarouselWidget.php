<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Carousel;

$countCar = sizeof($model);

?>
<section class="carousel-section">
    <div id="carousel-example-generic" class="carousel carousel-razon slide" data-ride="carousel" data-interval="<?=(int)Carousel::TIME?>">
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < $countCar; $i++){ ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" <?=($i == 0)?' class="active"':''?>></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach($model AS $k => $v){ ?>
            <div class="item<?=($k == 0)?' active':''?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7">
                            <div class="carousel-caption">
                                <div class="carousel-text">
                                    <h1 class="animated fadeInDownBig animation-delay-7 carousel-title"><?=$v->getName()?></h1>
                                    <?=$v->getText()?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5 hidden-xs carousel-img-wrap">
                            <div class="carousel-img">
                                <img src="<?=Carousel::getImg($v->id)?>" class="img-responsive animated bounceInUp animation-delay-3" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section>
