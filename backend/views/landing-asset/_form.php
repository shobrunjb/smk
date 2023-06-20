<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

use backend\models\LaporanPublik;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPublik */
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

<div class="informasi-publik-form">

    <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-lg-2',
                    'offset' => 'col-lg-offset-2',
                    'wrapper' => 'col-lg-10',
                ],
            ],
        ]);  ?>

    <?php //= $form->field($model, 'id_jenis_landing_asset')->textInput() ?>

    <?php
    $listJenisLandingAsset = \yii\helpers\ArrayHelper::map(\backend\models\JenisLandingAsset::find()->orderBy([
        'jenis_landing_asset' => SORT_ASC
        ])->
        asArray()->all(), 'id_jenis_landing_asset', 'jenis_landing_asset');
    ?>

    <?= $form->field($model, 'id_jenis_landing_asset')->dropDownList(
        $listJenisLandingAsset,
        ['prompt' => 'Pilih Jenis Asset ...']
    ); ?>

    <?php //= $form->field($model, 'id_parent')->textInput(['maxlength' => true]) ?>

     <?php
     /*
     $dataParent = \yii\helpers\ArrayHelper::map(LaporanPublik::find()->asArray()->where(['id_parent' => 0])->all(), 'id_laporan_publik', 'judul');
     //$dataParentTopnav = ['0' => 'Is Parent (Induk)'] + \yii\helpers\ArrayHelper::map(LaporanPublik::find()->asArray()->where(['id_parent' => 0])->all(), 'id_laporan_publik', 'judul');
     echo $form->field($model, 'id_parent')->dropDownList($dataParent
        );
        */
      ?>

    <?php //= $form->field($model, 'has_child')->textInput() ?>

    <?php /*
    <?= $form->field($model, 'has_child')->dropDownList(
        ['0' => 'TIDAK', '1' => 'YA']
    ); ?>
    */ ?>
    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor')->textInput(['maxlength' => true]) ?>

    

    <?php //= $form->field($model, 'triwulan')->textInput(['maxlength' => true]) ?>

    <?php /*
    <?= $form->field($model, 'triwulan')->dropDownList(
        ['0' => '--', '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV']
    ); ?>

    <?php //= $form->field($model, 'icon')->fileInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'nomor')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => 4]) ?>

    <?php //= $form->field($model, 'id_bagian')->textInput() ?>

    */ ?>

    <?= $form->field($model, 'type')->dropDownList(
        ['FILE' => 'FILE', 'URL' => 'URL / LINK']
    ); ?>

    <?= $form->field($model, 'is_active')->radioList(array('1'=>'Active','0'=>'Not Active')) ?>

    <div class="form-group field-content-keyname required">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <div class="alert alert-info">Silakan masukkan file jika memilih file. Dan memasukkan URL jika memilih type link.
            </div>
        </div>
    </div>

    <?= $form->field($model, 'link_url')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>


    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
