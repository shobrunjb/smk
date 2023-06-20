<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-session-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">
<!--
    <?= $form->field($model, 'id_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'session_date')->textInput() ?>

    <?= $form->field($model, 'last_position')->textInput() ?>

    <?= $form->field($model, 'last_question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'last_hit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actual_start')->textInput() ?>

    <?= $form->field($model, 'actual_end')->textInput() ?>

    <?= $form->field($model, 'durasi')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_submit')->textInput() ?>

    <?= $form->field($model, 'stat_total_number_question')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>

-->

 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
