<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekPenilaianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-aspek-penilaian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_aspek_penilaian') ?>

    <?= $form->field($model, 'id_smk_skenario') ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'aspek_penilaian') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'kategori') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'is_used') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
