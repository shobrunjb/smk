<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportErrorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-error-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_support_error') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'file_pendukung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
