<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\components\UserComponent;
?>

<div class="form-group">
    <? $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
        <?= Html::img(UserComponent::getUserImage(Yii::$app->user->id)) ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= Html::label('Avatar') ?>
        <?= Html::fileInput('avatar') ?>
        <?= Html::submitButton('save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php ActiveForm::end() ?>
</div>
