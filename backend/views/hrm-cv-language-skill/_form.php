<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvLanguageSkill */
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

<div class="hrm-cv-language-skill-form">

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
    if ($model->hasErrors()) {
    ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model); ?>
        </div>
    <?php
    }
    ?>

    <?php
    //Mengambil list dari tabel sebelah (data sekolah)
    $listBahasa = \yii\helpers\ArrayHelper::map(
        \backend\models\HrmMstBahasa::find()
            ->orderBy([
                'id_mst_bahasa' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_mst_bahasa',
        'bahasa'
    );
    ?>

    <?php // $form->field($model, 'code_id')->textInput() ?>

    <?php //= $form->field($model, 'id_pegawai')->textInput() ?>

    <?php // $form->field($model, 'bahasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mst_bahasa')->dropDownList(
        $listBahasa,
        ['prompt' => 'Pilih Bahasa']
    ); ?>


    <?= $form->field($model, 'tingkat_keahlian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'punya_sertifikat')->textInput() ?>

    <?= $form->field($model, 'sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_sertifikat')->textInput(['maxlength' => true]) ?>

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
