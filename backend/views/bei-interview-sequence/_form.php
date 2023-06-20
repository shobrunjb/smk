<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSequence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bei-interview-sequence-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bei_interview_batch')->textInput() ?>

    <?= $form->field($model, 'no')->textInput() ?>

    <?= $form->field($model, 'id_bei_mst_category_predef_quest')->textInput() ?>

    <?= $form->field($model, 'id_bei_sequence')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
