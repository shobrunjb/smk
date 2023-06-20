<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKeluarga */
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

<div class="hrm-cv-keluarga-form">

    <?php // $form = ActiveForm::begin(); ?>
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

    <?php //= $form->field($model, 'code_id')->textInput() ?>

    <?= $form->field($model, 'kategori')->dropDownList(
        [ 
          'empty' => 'Pilih Kategori Keluarga',
          'Bapak' => 'Bapak', 
          'Ibu' => 'Ibu',
          'Adik' => 'Adik', 
          'Kakak' => 'Kakak', 
          'Anak' => 'Anak', 
          'Cucu' => 'Cucu',
          'Kakek' => 'Kakek', 
          'Nenek' => 'Nenek',
          'Tante' => 'Tante', 
          'Paman' => 'Paman'
        ]
    ); ?>
    <?php //= $form->field($model, 'id_mst_jenis_hub_keluarga')->textInput() ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'tanggal_lahir')->widget(datepicker::className(), [
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

    <?php //= $form->field($model, 'usia')->textInput() ?>

    <?php //= $form->field($model, 'usia_lebih_bulan')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        [   'empty' => 'Pilih Jenis Kelamin',
            'Perempuan' => 'Perempuan', 'Laki-laki' => 'Laki-laki']
    ); ?>

    <?php //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php // 'BEKERJA','KULIAH','SEKOLAH','BELUM SEKOLAH' ?>
    <?= $form->field($model, 'status')->dropDownList(
        [   'empty' => 'Pilih Status',
            'BEKERJA' => 'BEKERJA', 'KULIAH' => 'KULIAH','SEKOLAH' => 'SEKOLAH', 'BELUM SEKOLAH' => 'BELUM SEKOLAH',]
    ); ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'golongan_darah')->dropDownList(
        [   'empty' => 'Pilih Golongan Darah',
            'Golongan Darah O' => 'Golongan Darah O', 
            'Golongan Darah A' => 'Golongan Darah A',
            'Golongan Darah AB' => 'Golongan Darah AB', 
            'Golongan Darah B' => 'Golongan Darah B',]
    ); ?>

    <?= $form->field($model, 'agama')->dropDownList(
        [   'empty' => 'Pilih Agama',
            'Islam' => 'Islam', 
            'Kristen Protestan' => 'Kristen Protestan',
            'Kristen Katolik' => 'Kristen Katolik',
            'Budha' => 'Budha', 
            'Hindu' => 'Hindu',
            'Konghucu' => 'Konghucu',
            ]
    ); ?>

    <?= $form->field($model, 'status_pernikahan')->dropDownList(
        [   'empty' => 'Pilih Status Pernikahan',
            'Belum Menikah' => 'Belum Menikah',
            'Menikah' => 'Menikah', 
            'Cerai Hidup' => 'Cerai Hidup',
            'Cerai Mati' => 'Cerai Mati', 
            ]
    ); ?>

    <?php
    echo $form->field($model, 'tanggal_menikah')->widget(datepicker::className(), [
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
    echo $form->field($model, 'tanggal_bercerai')->widget(datepicker::className(), [
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
    echo $form->field($model, 'tanggal_meninggal')->widget(datepicker::className(), [
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

    <?= $form->field($model, 'status_tunjangan')->textInput() ?>

    <?php
    echo $form->field($model, 'tanggal_tunjangan')->widget(datepicker::className(), [
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
