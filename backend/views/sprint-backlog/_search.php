<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintBacklogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprint-backlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sprint_backlog') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_sprint') ?>

    <?= $form->field($model, 'id_product_backlog') ?>

    <?= $form->field($model, 'start_work') ?>

    <?php // echo $form->field($model, 'end_work') ?>

    <?php // echo $form->field($model, 'last_contribute_user') ?>

    <?php // echo $form->field($model, 'total_duration') ?>

    <?php // echo $form->field($model, 'id_time_metric') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
