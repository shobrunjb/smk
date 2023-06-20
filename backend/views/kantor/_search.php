<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KantorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kantor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kantor') ?>

    <?= $form->field($model, 'nama_kantor') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'id_kabupaten') ?>

    <?= $form->field($model, 'id_provinsi') ?>

    <?php // echo $form->field($model, 'id_negara') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
