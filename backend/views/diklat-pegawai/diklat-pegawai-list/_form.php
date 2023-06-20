<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiList */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<div class="diklat-pegawai-list-form">

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
    <?php

    //Mengambil list dari tabel sebelah (material)
    $listPeserta = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmPegawai::find()
            ->where([
                'id_hrm_status_pegawai' => '1'
            ])
            ->orderBy([
                'id_pegawai' => SORT_ASC
            ])->asArray()->all(),
        'id_pegawai',
        'nama_lengkap'
    );
    ?>


    <?= $form->field($model, 'id_pegawai')->dropDownList(
        $listPeserta,
        ['prompt' => 'Pilih Anggota']
    ); ?>

    <!-- <div class="form-group"> -->
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>