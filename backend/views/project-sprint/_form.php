<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Sprint */
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
<div class="sprint-form">

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

    <?php //= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'sprint_number')->textInput() ?>

    <?php //= $form->field($model, 'sprint_code')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'duration_in_week')->textInput() ?>

    <?php //= $form->field($model, 'start_date')->textInput() ?>

    <?php //= $form->field($model, 'end_date')->textInput() ?>

    <?php
    echo $form->field($model, 'start_date')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            //'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'end_date')->widget(datepicker::className(), [
        'model' => $model,
        'attribute' => 'date',
        'template' => '{addon}{input}',
        //'options' => ['readonly' => 'readonly'],
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            //'endDate' => date('Y-m-d'),
        ]
    ]);
    ?>

    <?php /*

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'is_locked')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>

            <?php
            //<i class="fa fa-fw fa-backward"></i> 
            echo \yii\helpers\Html::a(
                  'Cancel',
                  ['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index'],
                  ['class' => 'btn btn-warning']
              );
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
