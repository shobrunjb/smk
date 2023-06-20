<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisLaporan */
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


<div class="jenis-Laporan-form">

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

    <?= $form->field($model, 'jenis_laporan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'icon')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->radioList(array('1'=>'Active','0'=>'Not Active')) ?>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
