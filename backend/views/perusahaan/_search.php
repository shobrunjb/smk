<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerusahaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perusahaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'perusahaan') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'alamat_kontak') ?>

    <?= $form->field($model, 'telepon_kontak') ?>

    <?php // echo $form->field($model, 'email_kontak') ?>

    <?php // echo $form->field($model, 'active_status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
