<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiLog */
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
<div class="absensi-log-form">

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

    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>

    <?php
    //Mengambil list dari tabel hrm-pegawai
    $listPegawai = \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()->orderBy([
        'nama_lengkap' => SORT_ASC
        ])->
        asArray()->all(), 'id_pegawai', 'nama_lengkap');
    ?>

    <?= $form->field($model, 'id_pegawai')->dropDownList(
        $listPegawai,
        ['prompt' => 'Pilih Pegawai ...']
    ); ?>

    <?= $form->field($model, 'tanggal_absensi')->textInput() ?>

    <?= $form->field($model, 'waktu_absensi')->textInput() ?>

    <!-- <?= $form->field($model, 'id_absensi_type')->textInput() ?> -->
    
    <?php
    //Mengambil list dari tabel AbsensiType
    $listAbsensiType = \yii\helpers\ArrayHelper::map(\backend\models\AbsensiType::find()->orderBy([
        'absensi_type' => SORT_ASC
        ])->
        asArray()->all(), 'id_absensi_type', 'absensi_type');
    ?>

    <?= $form->field($model, 'id_absensi_type')->dropDownList(
        $listAbsensiType,
        ['prompt' => 'Pilih Tipe Absensi ...']
    ); ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'id_kantor')->textInput() ?> -->

    <?php
    //Mengambil list dari tabel AbsensiType
    $listKantor = \yii\helpers\ArrayHelper::map(\backend\models\HrmKantor::find()->orderBy([
        'nama_kantor' => SORT_ASC
        ])->
        asArray()->all(), 'id_kantor', 'nama_kantor');
    ?>

    <?= $form->field($model, 'id_kantor')->dropDownList(
        $listKantor,
        ['prompt' => 'Pilih Kantor ...']
    ); ?>

    <?= $form->field($model, 'foto_bukti')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
