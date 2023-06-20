<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
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

<div class="order-pegawai-form">
    <div class="callout callout-info">
        <h4>Petunjuk</h4>
        <p>PAda tahap validasi ini, silakan tentukan status order apakah akan dilanjutkan atau di-pending dulu. Atau jika tidak tepat silakan dibatalkan.</p>
    </div>
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

    <?= $form->field($model, 'status_order')->dropDownList(
        ['OPEN' => 'LANJUT', 'PENDING' => 'PENDING', 'CANCEL' => 'BATAL'],
        ['prompt' => '-- Silakan Pilih Status Order--']
    ) ?>

    <div class="box-footer">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>