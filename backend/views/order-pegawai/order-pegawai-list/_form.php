<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

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

    <?php /*
    <?php
    //Mengambil list dari tabel sebelah (material)
    $listIdOrder = \yii\helpers\ArrayHelper::map(
        \backend\models\OrderPegawai::find()->orderBy([
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
    */ ?>

    <?php //= $form->field($model, 'id_pegawai')->textInput() 
    ?>
    <?php

    //Mengambil list dari tabel sebelah (material)
    $listAnggota = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmPegawai::find()
            ->where([
                'id_hrm_status_pegawai' => 1
            ])
            ->orderBy([
                'nama_lengkap' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_pegawai',
        'nama_lengkap'
    );
    ?>

    <?php /* = $form->field($model, 'id_pegawai')->dropDownList(
        $listAnggota,
        ['prompt' => 'Pilih Anggota']
    ); */ ?>

        <?php 
        echo $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
            'data' => $listAnggota,
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => [
                'prompt' => 'Pilih Pegawai/Karyawan']
        ]);
        ?>

    <!-- <div class="form-group"> -->
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>