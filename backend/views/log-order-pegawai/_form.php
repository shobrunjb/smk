<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\logOrderPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
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

<div class="log-order-pegawai-form box box-success">

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]); ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listOrder = \yii\helpers\ArrayHelper::map(
            \backend\models\OrderPegawai::find()->orderBy([
                'id_order_pegawai' => SORT_ASC
            ])->asArray()->all(),
            'id_order_pegawai',
            'id_order_pegawai'
        );
        ?>

        <?= $form->field($model, 'id_order_pegawai')->dropDownList(
            $listOrder,
            ['prompt' => 'Pilih Order']
        ); ?>

        <?php
        //Mengambil list dari tabel sebelah (material)
        $listProgress = \yii\helpers\ArrayHelper::map(
            \backend\models\MstOrderProgres::find()->orderBy([
                'id_mst_order_progres' => SORT_ASC
            ])->asArray()->all(),
            'id_mst_order_progres',
            'order_progress'
        );
        ?>

        <?= $form->field($model, 'id_mst_order_progress')->dropDownList(
            $listProgress,
            ['prompt' => 'Pilih Progress']
        ); ?>

        <?= $form->field($model, 'isi_log_order')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>