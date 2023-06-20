<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkMstJenisPeriodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-mst-jenis-periode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_smk_mst_jenis_periode') ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'jenis_periode') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'is_used') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
