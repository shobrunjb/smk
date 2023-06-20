<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintCeremonySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprint-ceremony-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sprint_ceremony') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_sprint') ?>

    <?= $form->field($model, 'ceremony') ?>

    <?= $form->field($model, 'noted') ?>

    <?php // echo $form->field($model, 'external_notes1') ?>

    <?php // echo $form->field($model, 'external_notes2') ?>

    <?php // echo $form->field($model, 'external_notes3') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
