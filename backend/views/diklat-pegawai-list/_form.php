<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diklat-pegawai-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_diklat')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
