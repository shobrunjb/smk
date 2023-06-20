<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiKarAssesJawabanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-kar-asses-jawaban-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_kar_asses_jawaban') ?>

    <?= $form->field($model, 'id_kompetensi_dasar') ?>

    <?= $form->field($model, 'id_bei_compentecy_question') ?>

    <?= $form->field($model, 'id_hrm_competency_dimension') ?>

    <?= $form->field($model, 'id_bei_interview_session') ?>

    <?php // echo $form->field($model, 'id_pegawai') ?>

    <?php // echo $form->field($model, 'soal') ?>

    <?php // echo $form->field($model, 'jawaban') ?>

    <?php // echo $form->field($model, 'score_by_machine') ?>

    <?php // echo $form->field($model, 'score_by_asesor') ?>

    <?php // echo $form->field($model, 'key_verb') ?>

    <?php // echo $form->field($model, 'key_time') ?>

    <?php // echo $form->field($model, 'key_location') ?>

    <?php // echo $form->field($model, 'r_st') ?>

    <?php // echo $form->field($model, 'r_ar') ?>

    <?php // echo $form->field($model, 'modified_time') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
