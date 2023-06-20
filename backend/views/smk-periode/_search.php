<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPeriodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk-periode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_smk_periode') ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'id_smk_mst_jenis_periode') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'periode_no') ?>

    <?php // echo $form->field($model, 'nama_periode') ?>

    <?php // echo $form->field($model, 'is_current_periode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
