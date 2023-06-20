<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKesehatan */
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

<div class="hrm-cv-kesehatan-form">

    <?php// $form = ActiveForm::begin(); ?>
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
    //Mengambil list dari tabel sebelah (tingkat pendidikan)
    $listJenisTunjangan = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmMstJenisTunjanganKesehatan::find()
            ->orderBy([
                'id_mst_jenis_tunjangan_kesehatan' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_mst_jenis_tunjangan_kesehatan',
        'jenis_tunjangan_kesehatan'
    );
    ?>

    <?php
    //Mengambil list dari tabel sebelah (tingkat pendidikan)
    $listJenisPenyakit = \yii\helpers\ArrayHelper::map(
        \backend\models\MstJenisPenyakit::find()
            ->orderBy([
                'id_mst_jenis_penyakit' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_mst_jenis_penyakit',
        'jenis_penyakit'
    );
    ?>

    <?php // $form->field($model, 'code_id')->textInput() ?>


    <?= $form->field($model, 'penyakit_diderita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mst_jenis_penyakit')->dropDownList(
       $listJenisPenyakit,
        ['prompt' => 'Pilih Jenis Penyakit']
    ); ?>

    <?= $form->field($model, 'deskripsi_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tingkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lama_sakit')->textInput() ?>

    <?= $form->field($model, 'id_mst_jenis_tunjangan_kesehatan')->dropDownList(
       $listJenisTunjangan,
        ['prompt' => 'Pilih Tunjangan Kesehatan']
    ); ?>

    <br><br>
    
</div>

    <div class="box box-primary">
        <div class="box-body">
            <div class="box-header with-border">
            <h3 class="box-title">Ditanggung Perusahaan</h3>
            </div>
            <?= $form->field($model, 'ditanggung_perusahaan')->dropDownList(
                [   'empty' => 'Pilih Status',
                    1 => 'YA', '0' => 'TIDAK']
            ); ?>

            <?php
            echo $form->field($model, 'tanggal_penggantian')->widget(datepicker::className(), [
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

            <?= $form->field($model, 'biaya_ditanggung')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

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