<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-session-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_interview_session') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'session_date') ?>

    <?= $form->field($model, 'last_position') ?>

    <?= $form->field($model, 'last_question') ?>

    <?php // echo $form->field($model, 'last_hit') ?>

    <?php // echo $form->field($model, 'actual_start') ?>

    <?php // echo $form->field($model, 'actual_end') ?>

    <?php // echo $form->field($model, 'durasi') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'last_submit') ?>

    <?php // echo $form->field($model, 'stat_total_number_question') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
