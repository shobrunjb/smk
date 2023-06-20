<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiKarAssesJawaban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-kar-asses-jawaban-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kompetensi_dasar')->textInput() ?>

    <?= $form->field($model, 'id_bei_compentecy_question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_hrm_competency_dimension')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bei_interview_session')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jawaban')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'score_by_machine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'score_by_asesor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_verb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_st')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_time')->textInput() ?>

    <?= $form->field($model, 'modified_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
