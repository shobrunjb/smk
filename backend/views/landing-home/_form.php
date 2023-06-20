<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use floor12\summernote\Summernote;

/* @var $this yii\web\View */
/* @var $model backend\models\LandingHome */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landing-home-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_number')->textInput() ?>

    <?= $form->field($model, 'page_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_html')->textarea(['rows' => 12]) ?>

    <?= $form->field($model, 'is_active')->radioList(array('1'=>'Active','0'=>'Not Active')) ?>
    <?php /*
    <div id="type-text-editor" >
    <?= $form->field($model, 'source_html')->widget(TinyMce::className(), [
        'options' => ['rows' => 16],
        'language' => 'id',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime image media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ])?>
    </div>
    */ ?>

  <div id="type-text-editor" >
    <?= $form->field($model, 'source_html')->widget(Summernote::className(), [
        'options' => ['rows' => 16],
        'language' => 'id',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime image media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
