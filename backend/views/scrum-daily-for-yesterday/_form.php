<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForYesterday */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrum-daily-for-yesterday-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_scrum_daily')->textInput() ?>

    <?= $form->field($model, 'id_sprint_backlog')->textInput() ?>

    <?= $form->field($model, 'progres')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
