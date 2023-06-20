<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanKinerjaPegawai */
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

<div class="laporan-kinerja-pegawai-form">

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
    <div class='row' style='display:none'>
        <?= $form->field($model, 'id_order_pegawai')->textInput() ?>

        <?php //= $form->field($model, 'id_pegawai')->textInput() 
        ?>
        <?php

        //Mengambil list dari tabel sebelah (material)
        $listAnggota = \yii\helpers\ArrayHelper::map(
            \backend\models\HrmPegawai::find()
                ->orderBy([
                    'id_pegawai' => SORT_ASC
                ])
                ->asArray()->all(),
            'id_pegawai',
            'nama_lengkap'
        );
        ?>
    </div>
    <div class='row' style='display:none'>
    <div>
        <?= $form->field($model, 'id_pegawai')->dropDownList(
            $listAnggota,
            ['disabled' => $model->isNewRecord, 'prompt' => 'Pilih Anggota', 'readonly' => 'readonly']
        ); ?>
    </div>


        <?= $form->field($model, 'id_pegawai')->dropDownList(
            $listAnggota,
            ['prompt' => 'Pilih Anggota']
        ); ?>
    </div>

    <?= $form->field($model, 'deskripsi')->textarea(['maxlength' => true]) ?>

    <div class="form">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>