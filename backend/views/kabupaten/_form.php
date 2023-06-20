<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?= $form->field($model, 'id_propinsi')->textInput() ?>

    <?= $form->field($model, 'nama_kabupaten')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
