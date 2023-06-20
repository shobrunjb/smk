<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkMstJenisPeriode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-mst-jenis-periode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?= $form->field($model, 'jenis_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_used')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
