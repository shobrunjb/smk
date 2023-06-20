<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSequenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-sequence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_interview_sequence') ?>

    <?= $form->field($model, 'id_bei_interview_batch') ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'id_bei_mst_category_predef_quest') ?>

    <?= $form->field($model, 'id_bei_sequence') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
