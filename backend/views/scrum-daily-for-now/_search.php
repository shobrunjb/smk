<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForNowSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrum-daily-for-now-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_scrum_daily_for_now') ?>

    <?= $form->field($model, 'id_scrum_daily') ?>

    <?= $form->field($model, 'id_sprint_backlog') ?>

    <?= $form->field($model, 'target') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
