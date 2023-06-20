<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRentangNilai */
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

<div class="smk-aspek-rentang-nilai-form">
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

    <?= $form->field($model, 'nama_rentang_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'predikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'predikat_nilai')->textInput() ?>

    <?= $form->field($model, 'is_has_rentang')->textInput() ?>

    <?= $form->field($model, 'batas_bawah')->textInput() ?>

    <?= $form->field($model, 'batas_atas')->textInput() ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
