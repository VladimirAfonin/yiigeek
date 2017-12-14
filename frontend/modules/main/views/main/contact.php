<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\{Url, Html};
?>
<div class="container">
    <div class="spacer">
        <div class="row register">
            <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($contactModel, 'name') ?>
                <?= $form->field($contactModel, 'email') ?>
                <?= $form->field($contactModel, 'subject') ?>
                <?= $form->field($contactModel, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($contactModel, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    'captchaAction' => Url::to(['main/captcha'])
                ]) ?>
                <?= Html::submitButton('send', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>



