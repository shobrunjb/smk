<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_order_pegawai') ?>

    <?= $form->field($model, 'tanggal_order') ?>

    <?= $form->field($model, 'nomor_order') ?>

    <?= $form->field($model, 'nomor_order_inc') ?>

    <?= $form->field($model, 'id_order_pegawai_kategori') ?>

    <?php // echo $form->field($model, 'id_asset_kendaraan1') ?>

    <?php // echo $form->field($model, 'id_asset_kendaraan2') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'id_mst_order_progres') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'total_biaya') ?>

    <?php // echo $form->field($model, 'status_pembayaran') ?>

    <?php // echo $form->field($model, 'tanggal_pembayaran') ?>

    <?php // echo $form->field($model, 'bukti_pembayaran') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
