<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKeluargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-keluarga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_keluarga') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'kategori') ?>

    <?= $form->field($model, 'id_mst_jenis_hub_keluarga') ?>

    <?php // echo $form->field($model, 'nama_lengkap') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'usia') ?>

    <?php // echo $form->field($model, 'usia_lebih_bulan') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'tanggal_menikah') ?>

    <?php // echo $form->field($model, 'tanggal_bercerai') ?>

    <?php // echo $form->field($model, 'tanggal_meninggal') ?>

    <?php // echo $form->field($model, 'golongan_darah') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status_pernikahan') ?>

    <?php // echo $form->field($model, 'status_tunjangan') ?>

    <?php // echo $form->field($model, 'tanggal_tunjangan') ?>

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
