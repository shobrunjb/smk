<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvAsuransi */
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

<div class="hrm-cv-asuransi-form">

    <?php //$form = ActiveForm::begin(); ?>
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

    <?php
    //Mengambil list dari tabel sebelah
    $listPerusahaanAsuransi = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmPerusahaanAsuransi::find()
            ->orderBy([
                'id_hrm_perusahaan_asuransi' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_hrm_perusahaan_asuransi',
        'perusahaan_asuransi'
    );
    ?>

    <?php
    //Mengambil list dari tabel sebelah
    $listJenisAsuransi = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmMstJenisAsuransi::find()
            ->orderBy([
                'id_hrm_mst_jenis_asuransi' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_hrm_mst_jenis_asuransi',
        'jenis_asuransi'
    );
    ?>

    <?php // $form->field($model, 'code_id')->textInput() ?>

    <?php // $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'id_hrm_perusahaan_asuransi')->dropDownList(
        $listPerusahaanAsuransi,
        ['prompt' => 'Pilih Perusahaan Asuransi']
    ); ?>

    <?= $form->field($model, 'id_hrm_mst_jenis_asuransi')->dropDownList(
        $listJenisAsuransi,
        ['prompt' => 'Pilih Jenis Asuransi']
    ); ?>

    <?= $form->field($model, 'ditanggung_perusahaan')->dropDownList(
        [   'empty' => 'Pilih Status',
            1 => 'YA', '0' => 'TIDAK']
    ); ?>


    <?php
    echo $form->field($model, 'tanggal_mulai_asuransi')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options'=>['readonly'=>'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            // 'endDate' => date('Y-m-d'),
            'startDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'tanggal_jatuh_tempo')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options'=>['readonly'=>'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            // 'endDate' => date('Y-m-d'),
            'startDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?= $form->field($model, 'durasi_asuransi')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php /*
    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>

    */?>
    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
