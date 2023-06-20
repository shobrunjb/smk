<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */
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
<div class="project-form">

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

    <?php //= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?php //= $form->field($model, 'id_project_mst_type')->textInput() ?>

    <?php //= $form->field($model, 'kode_proyek')->textInput() ?>

    <?= $form->field($model, 'nama_proyek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?php //= $form->field($model, 'is_active')->textInput() ?>

    <?php //= $form->field($model, 'backlog_is_locked')->textInput() ?>

    <?= $form->field($model, 'repo_code')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'repo1')->textInput(['maxlength' => true]) ?>

    <?php /*
    <?= $form->field($model, 'repo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo6')->textInput(['maxlength' => true]) ?>
    */ ?>

    <?php //= $form->field($model, 'plan_start_date')->textInput() ?>

    <?php
    echo $form->field($model, 'plan_start_date')->widget(datepicker::className(), [
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

    <?php //= $form->field($model, 'plan_end_date')->textInput() ?>

    <?php
    echo $form->field($model, 'plan_end_date')->widget(datepicker::className(), [
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

    <?= $form->field($model, 'actual_start_date')->textInput() ?>

    <?= $form->field($model, 'actual_end_date')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>
    */ ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
