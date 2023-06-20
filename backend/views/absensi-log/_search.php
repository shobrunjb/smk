<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_absensi_log') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'tanggal_absensi') ?>

    <?= $form->field($model, 'waktu_absensi') ?>

    <?= $form->field($model, 'id_absensi_type') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'id_kantor') ?>

    <?php // echo $form->field($model, 'foto_bukti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
