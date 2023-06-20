<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiCompentecyQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-compentecy-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bei_compentecy_question') ?>

    <?= $form->field($model, 'id_hrm_competency_dimension') ?>

    <?= $form->field($model, 'question_ind') ?>

    <?= $form->field($model, 'question_eng') ?>

    <?= $form->field($model, 'number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
