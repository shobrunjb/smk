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

<div class="log-order-pegawai-form ">

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            //'layout' => 'horizontal',
            //'class' => 'form-horizontal',
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
        // Mengambil list dari tabel sebelah (material)
        $listOrder = \yii\helpers\ArrayHelper::map(
            \backend\models\OrderPegawai::find()->orderBy([
                'id_order_pegawai' => SORT_ASC
            ])->asArray()->all(),
            'id_order_pegawai',
            'id_order_pegawai'
        );
        ?>
        
        <div class='row' style='display:none'>
            <?php
            echo $form->field($model, 'id_order_pegawai')->dropDownList(
                $listOrder,
                ['prompt' => 'Pilih Order']
            );
            ?>

            <?php
            // echo "progress :";
            // echo $model->id_mst_order_progress;
            ?> <br>
            <?php
            // echo "id order :";
            // echo $model->id_order_pegawai;

            // Mengambil list dari tabel sebelah (material)
            $listProgress = \yii\helpers\ArrayHelper::map(
                \backend\models\MstOrderProgres::find()->orderBy([
                    'id_mst_order_progres' => SORT_ASC
                ])->asArray()->all(),
                'id_mst_order_progres',
                'order_progress'
            );
            ?>

            <?php
            echo $form->field($model, 'id_mst_order_progress')->dropDownList(
                $listProgress,
                ['prompt' => 'Pilih Progress']
            );
            ?>
        </div>
        
        <?= $form->field($model, 'isi_log_order')->textarea(['maxlength' => true]) ?>

        <!-- <div class="form-group"> -->
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        <!-- </div> -->

        <?php ActiveForm::end(); ?>

    </div>