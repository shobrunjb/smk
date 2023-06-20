<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiList */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>


<div class="order-pegawai-list-form">

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

    <?php
    //Mengambil list dari tabel sebelah (material)
    $listIdOrder = \yii\helpers\ArrayHelper::map(
        \backend\models\orderPegawai::find()->orderBy([
            'id_order_pegawai' => SORT_ASC
        ])->asArray()->all(),
        'id_order_pegawai',
        'id_order_pegawai'
    );
    ?>

    <?= $form->field($model, 'id_order_pegawai')->dropDownList(
        $listIdOrder,
        ['prompt' => 'Pilih Id Order']
    ); ?>

    <?php //= $form->field($model, 'id_pegawai')->textInput() 
    ?>
    <?php
    //Mengambil list dari tabel sebelah (material)
    $listAnggota = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmPegawai::find()->orderBy([
            'id_pegawai' => SORT_ASC
        ])->asArray()->all(),
        'id_pegawai',
        'id_pegawai'
    );
    ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList(
        $listAnggota,
        ['prompt' => 'Pilih Anggota']
    ); ?>


    <!-- <div class="form-group"> -->
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>