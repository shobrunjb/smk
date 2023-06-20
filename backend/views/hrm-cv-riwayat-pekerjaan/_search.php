<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPekerjaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-riwayat-pekerjaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_riwayat_pekerjaan') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'nama_perusahaan') ?>

    <?= $form->field($model, 'jenis_pekerjaan') ?>

    <?php // echo $form->field($model, 'jabatan_terakhir') ?>

    <?php // echo $form->field($model, 'tahun_mulai') ?>

    <?php // echo $form->field($model, 'tahun_selesai') ?>

    <?php // echo $form->field($model, 'gaji_bruto') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

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
