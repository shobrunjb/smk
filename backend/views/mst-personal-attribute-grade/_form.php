<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttributeGrade */
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

<div class="mst-personal-attribute-grade-form">

    <?php //$form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?php
    //Mengambil list dari tabel sebelah (tingkat pendidikan)
    $listPersonalAttribute = \yii\helpers\ArrayHelper::map(
        \backend\models\MstPersonalAttribute::find()
            ->orderBy([
                'id_mst_personal_attribute' => SORT_ASC
            ])
            ->asArray()->all(),
        'id_mst_personal_attribute',
        'personal_attribute'
    );
    ?>
    
    <?= $form->field($model, 'id_mst_personal_attribute')->dropDownList(
        $listPersonalAttribute,
        ['prompt' => 'Pilih Personal Attribute']
    ); ?>

    <?= $form->field($model, 'grade_label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_value')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
    
    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
