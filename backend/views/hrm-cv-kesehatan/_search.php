<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKesehatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-kesehatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cv_kesehatan') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'id_mst_jenis_tunjangan_kesehatan') ?>

    <?= $form->field($model, 'penyakit_diderita') ?>

    <?php // echo $form->field($model, 'id_mst_jenis_penyakit') ?>

    <?php // echo $form->field($model, 'deskripsi_penyakit') ?>

    <?php // echo $form->field($model, 'tingkat') ?>

    <?php // echo $form->field($model, 'lama_sakit') ?>

    <?php // echo $form->field($model, 'ditanggung_perusahaan') ?>

    <?php // echo $form->field($model, 'tanggal_penggantian') ?>

    <?php // echo $form->field($model, 'biaya_ditanggung') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
