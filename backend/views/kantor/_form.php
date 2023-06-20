<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="kantor-form">

    
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>
    <?= $form->field($model, 'nama_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'id_kabupaten')->textInput() ?>

    <?php
    //Mengambil list dari tabel Kabupaten
    $listStatus = \yii\helpers\ArrayHelper::map(
        \backend\models\Kabupaten::find()->orderBy([
            'nama_kabupaten' => SORT_ASC
        ])->asArray()->all(),
        'id_kabupaten',
        'nama_kabupaten'
    );
    ?>

    <?php
    //Mengambil list dari tabel Perusahaan
    $listStatus2 = \yii\helpers\ArrayHelper::map(
        \backend\models\Perusahaan::find()->orderBy([
            'perusahaan' => SORT_ASC
        ])->asArray()->all(),
        'id_perusahaan',
        'perusahaan'
    );
    ?>

    <?= $form->field($model, 'id_kabupaten')->dropDownList(
            $listStatus,
            ['prompt' => 'Pilih Kabupaten ...']
        ); ?>

    <?= $form->field($model, 'id_perusahaan')->dropDownList(
            $listStatus2,
            ['prompt' => 'Pilih Perusahaan ...']
        ); ?>

    <?php // $form->field($model, 'id_provinsi')->textInput() ?>

    <?php // $form->field($model, 'id_negara')->textInput() ?>

    <?php // $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
