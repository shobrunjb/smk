<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRentangNilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-aspek-rentang-nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_smk_aspek_rentang_nilai') ?>

    <?= $form->field($model, 'nama_rentang_nilai') ?>

    <?= $form->field($model, 'predikat') ?>

    <?= $form->field($model, 'predikat_nilai') ?>

    <?= $form->field($model, 'is_has_rentang') ?>

    <?php // echo $form->field($model, 'batas_bawah') ?>

    <?php // echo $form->field($model, 'batas_atas') ?>

    <?php // echo $form->field($model, 'label') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
