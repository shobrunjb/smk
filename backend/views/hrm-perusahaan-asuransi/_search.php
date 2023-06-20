<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPerusahaanAsuransiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-perusahaan-asuransi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hrm_perusahaan_asuransi') ?>

    <?= $form->field($model, 'perusahaan_asuransi') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'alamat_kontak') ?>

    <?= $form->field($model, 'telepon_kontak') ?>

    <?php // echo $form->field($model, 'email_kontak') ?>

    <?php // echo $form->field($model, 'active_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
