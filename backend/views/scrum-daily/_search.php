<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrum-daily-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_scrum_daily') ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_sprint') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'standup_date') ?>

    <?php // echo $form->field($model, 'yesterday_todo') ?>

    <?php // echo $form->field($model, 'today_todo') ?>

    <?php // echo $form->field($model, 'obstacle') ?>

    <?php // echo $form->field($model, 'yesterday_bukti') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
