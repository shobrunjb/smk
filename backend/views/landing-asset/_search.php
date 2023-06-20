<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPublikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informasi-publik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_laporan_publik') ?>

    <?= $form->field($model, 'id_jenis_laporan') ?>

    <?= $form->field($model, 'id_parent') ?>

    <?= $form->field($model, 'has_child') ?>

    <?= $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'nomor') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'id_bagian') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
