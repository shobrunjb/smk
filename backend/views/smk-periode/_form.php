<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
//CSS Ini digunakan untuk menampilkan required field (field wajib isi)
?>
<style>
    div.required label.control-label:after {
        content: ' *';
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


<div class="smk-periode-form">

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

        

    <?= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?php //= $form->field($model, 'id_smk_mst_jenis_periode')->textInput() ?>
    <?php
        //Mengambil list dari tabel sebelah (jenis periode)
        $listStatus = \yii\helpers\ArrayHelper::map(
            \backend\models\SmkMstJenisPeriode::find()->orderBy([
                'id_smk_mst_jenis_periode' => SORT_ASC
            ])->asArray()->all(),
            'id_smk_mst_jenis_periode',
            'jenis_periode'
        );
        ?>

        <?= $form->field($model, 'id_smk_mst_jenis_periode')->dropDownList(
            $listStatus,
            ['prompt' => 'Pilih jenis ...']
        ); ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'periode_no')->textInput() ?>

    <?= $form->field($model, 'nama_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_current_periode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
