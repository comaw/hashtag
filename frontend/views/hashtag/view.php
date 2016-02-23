<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\UrlHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Hashtag */
/* @var $description app\models\HashtagDescription */
/* @var $newDescription app\models\HashtagDescription */

$this->title = $model->tag;
$this->registerMetaTag([ 'name' => 'description', 'content' => $this->title]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hashtags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hashtag-view">
    <div class="row">
        <div class="col-sm-6">
            <h1><?=Yii::t('app', 'Description hashtag')?>: <?=$this->title?></h1>
            <div class="pull-right">
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,blogger,linkedin,lj" data-size="s"></div>
            </div>
            <p><time datetime="<?=$model->created?>"><?=date("d/m/Y", strtotime($model->created))?></time></p>
            <div class="row">
                <div class="col-xs-12">
                    <h3><?=Yii::t('app', 'Значения')?>:</h3>
                    <?php if(sizeof($model->descriptions) > 0){foreach($model->descriptions AS $description){ ?>
                        <blockquote><?=isset($description->description) ? $description->description : ''?><a role="like" href="<?=Url::toRoute(['hashtag/like', 'id' => $description->id])?>" class="label label-primary pull-right"><?=Yii::t('app', 'Like')?> (<span><?=(int)$description->likes?></span>)</a></blockquote>
                        <hr>
                    <?php }} ?>
                </div>
            </div>
            <?php if(!Yii::$app->user->isGuest){ ?>
                <div class="row">
                    <div class="col-xs-12">
                        <h3><?=Yii::t('app', 'Добавить свое описание')?>:</h3>
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($newDescription, 'description')->textarea(['maxlength' => true])->hint(Yii::t('app', 'Description and use the hashtag. Max 500 chars')) ?>

                        <div class="form-group">
                            <?= Html::submitButton($newDescription->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $newDescription->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-6">
            <h3><?=Yii::t('app', 'Последние твиты по хештегу: "{hashteg}"', ['hashteg' => $model->tag ])?></h3>
            <?php if(sizeof($lastTwitter['statuses']) > 0){ ?>
                <?php foreach($lastTwitter['statuses'] AS $dataTweet){ ?>
            <div class="row">
                <div class="col-xs-12">
                    <small><time datetime="<?=date("Y-m-d H:i:s", strtotime($dataTweet['created_at']))?>"><?=date("d/m/Y H:i:s", strtotime($dataTweet['created_at']))?></time></small>
                    <p class="text-left">
                        <?=UrlHelper::autoLink($dataTweet['text'], 'both', true, true)?>
                        <?php if(isset($dataTweet['entities']['media']) && sizeof($dataTweet['entities']['media']) > 0){ ?>
                            <?php if($dataTweet['entities']['media'][0]['type'] == 'photo'){ ?>
                                <?=Html::img($dataTweet['entities']['media'][0]['media_url'], [
                                    'alt' => Html::encode($model->tag),
                                    'class' => 'img-responsive',
                                    'rel' => 'nofollow'
                                ])?>
                            <?php } ?>
                        <?php } ?>
                    </p>
                    <?php if(isset($dataTweet['entities']['hashtags']) && sizeof($dataTweet['entities']['hashtags']) > 0){ ?>
                        <ul class="list-inline">
                        <?php foreach($dataTweet['entities']['hashtags'] AS $entitiesHashtag){ ?>
                            <li>#<?=$entitiesHashtag['text']?></li>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                    <hr>
                </div>
            </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
