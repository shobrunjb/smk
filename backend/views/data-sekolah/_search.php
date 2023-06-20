<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DataSekolahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-sekolah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sekolah') ?>

    <?= $form->field($model, 'nama_sekolah') ?>

    <?= $form->field($model, 'nama_sekolah_short') ?>

    <?= $form->field($model, 'alamat_sekolah') ?>

    <?php // echo $form->field($model, 'is_valid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
