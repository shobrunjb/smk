<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewPeserta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-peserta-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?= $form->field($model, 'id_bei_interview_batch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
