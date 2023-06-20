<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintBacklog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprint-backlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'id_sprint')->textInput() ?>

    <?= $form->field($model, 'id_product_backlog')->textInput() ?>

    <?= $form->field($model, 'start_work')->textInput() ?>

    <?= $form->field($model, 'end_work')->textInput() ?>

    <?= $form->field($model, 'last_contribute_user')->textInput() ?>

    <?= $form->field($model, 'total_duration')->textInput() ?>

    <?= $form->field($model, 'id_time_metric')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
