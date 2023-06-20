<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvAsuransiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-cv-asuransi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cv_asuransi') ?>

    <?= $form->field($model, 'code_id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'id_hrm_perusahaan_asuransi') ?>

    <?= $form->field($model, 'id_hrm_mst_jenis_asuransi') ?>

    <?php // echo $form->field($model, 'ditanggung_perusahaan') ?>

    <?php // echo $form->field($model, 'tanggal_mulai_asuransi') ?>

    <?php // echo $form->field($model, 'tanggal_jatuh_tempo') ?>

    <?php // echo $form->field($model, 'durasi_asuransi') ?>

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
