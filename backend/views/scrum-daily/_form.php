<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDaily */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrum-daily-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'id_sprint')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'standup_date')->textInput() ?>

    <?= $form->field($model, 'yesterday_todo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'today_todo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obstacle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yesterday_bukti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
