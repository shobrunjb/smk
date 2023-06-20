<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diklat-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_diklat') ?>

    <?= $form->field($model, 'nama_diklat') ?>

    <?= $form->field($model, 'tanggal_diklat') ?>

    <?= $form->field($model, 'id_diklat_pegawai_kategori') ?>

    <?= $form->field($model, 'penyelenggara') ?>

    <?php // echo $form->field($model, 'jumlah_peserta') ?>

    <?php // echo $form->field($model, 'syarat') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
