<div class="container">
    <div class="row register">
        <div class="row">
            <?php $form = \yii\bootstrap\ActiveForm::begin() ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?= \yii\helpers\Html::submitButton('login', ['class' => 'btn btn-success']) ?>
            <?php \yii\bootstrap\ActiveForm::end() ?>
        </div>
    </div>
</div>