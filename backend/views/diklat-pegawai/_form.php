<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawai */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<div class="diklat-pegawai-form">

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

    <?= $form->field($model, 'nama_diklat')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'tanggal_diklat')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options'=>['readonly'=>'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php //= $form->field($model, 'id_diklat_pegawai_kategori')->textInput() 
    ?>
    <?php
    //Mengambil list dari tabel sebelah (material)
    $listKategori = \yii\helpers\ArrayHelper::map(
        \backend\models\diklatPegawaiKategori::find()->orderBy([
            'Kategori' => SORT_ASC
        ])->asArray()->all(),
        'id_diklat_pegawai_kategori',
        'Kategori'
    );
    ?>

    <?= $form->field($model, 'id_diklat_pegawai_kategori')->dropDownList(
        $listKategori,
        ['prompt' => 'Pilih Kategori ...']
    ); ?>

    <?= $form->field($model, 'penyelenggara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_peserta')->textInput() ?>

    <?= $form->field($model, 'syarat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>