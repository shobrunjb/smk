<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>

<div class="smk-aspek-penilaian-form">

<?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'class' => 'form-horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-3',
                    'wrapper' => 'col-sm-10',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]); ?>


    <?= $form->field($model, 'id_smk_skenario')->textInput() ?>

    <?= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?= $form->field($model, 'aspek_penilaian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mode')->textInput() ?>

    <?= $form->field($model, 'is_used')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
