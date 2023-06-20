<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\logOrderPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-order-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_log_order') ?>

    <?= $form->field($model, 'id_order_pegawai') ?>

    <?= $form->field($model, 'id_mst_order_progress') ?>

    <?= $form->field($model, 'isi_log_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
