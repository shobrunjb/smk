<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewBacth */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-bacth-form box box-primary">
    
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

<div class="box-body table-responsive">
        <div class="col-md-12">

    <?= $form->field($model, 'nama_batch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_peserta')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?php /*
    <?= $form->field($model, 'tanggal_mulai')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan tanggal ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose'=>true
        ]
    ]); ?>

     <?= $form->field($model, 'tanggal_selesai')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukkan tanggal ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose'=>true
        ]
    ]); ?>

    */ ?>
        <?= $form->field($model, 'tanggal_mulai')->widget(datepicker::className(), [
            'model' => $model,
            'attribute' => 'date',
            'template' => '{addon}{input}',
            //'options'=>['readonly'=>'readonly'],
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                //'endDate' => date('Y-m-d'),
            ]
        ]); ?>
        <?= $form->field($model, 'tanggal_selesai')->widget(datepicker::className(), [
            'model' => $model,
            'attribute' => 'date',
            'template' => '{addon}{input}',
            //'options'=>['readonly'=>'readonly'],
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                //'endDate' => date('Y-m-d'),
            ]
        ]); ?>


    <?php /* $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) */ ?>


 </div>
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
