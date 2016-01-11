<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;

?>
<?php if(Yii::$app->user->isGuest){ ?>
    <?php $login = new LoginForm(); ?>
    <div class="dropdown animated fadeInDown animation-delay-11">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=Yii::t('app', 'Вход')?></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
            <?php $form = ActiveForm::begin([
                'id' => 'loginform',
                'options' => ['role' => 'form', 'name' => 'loginform'] ,
                'action' => Url::toRoute('site/login'),
                'fieldConfig' => ['template' => "{input}\n{hint}"],
            ]); ?>
            <input type="hidden" name="returnUrl" value="<?=$returnUrl?>">
                <h4><?=Yii::t('app', 'Вход')?></h4>
                <div class="form-group">
                    <div class="input-group login-input">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <?= $form->field($login, 'username')->textInput(['placeholder' => Yii::t('app', 'Email')])->label(false) ?>
                    </div>
                    <br>
                    <div class="input-group login-input">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <?= $form->field($login, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Пароль')])->label(false) ?>
                    </div>
                    <div class="checkbox pull-left">
                        <label>
                            <?= $form->field($login, 'rememberMe')->checkbox() ?>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= Html::a(Yii::t('app', 'восстановить пароль'), ['site/requestPasswordReset']) ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-ar btn-primary pull-right"><?=Yii::t('app', 'Войти')?></button>
                    <div class="clearfix"></div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php } ?>
