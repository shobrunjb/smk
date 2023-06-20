<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'id_perusahaan') ?>

    <?= $form->field($model, 'id_project_mst_type') ?>

    <?= $form->field($model, 'kode_proyek') ?>

    <?= $form->field($model, 'nama_proyek') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'backlog_is_locked') ?>

    <?php // echo $form->field($model, 'repo_code') ?>

    <?php // echo $form->field($model, 'repo1') ?>

    <?php // echo $form->field($model, 'repo2') ?>

    <?php // echo $form->field($model, 'repo3') ?>

    <?php // echo $form->field($model, 'repo4') ?>

    <?php // echo $form->field($model, 'repo5') ?>

    <?php // echo $form->field($model, 'repo6') ?>

    <?php // echo $form->field($model, 'plan_start_date') ?>

    <?php // echo $form->field($model, 'plan_end_date') ?>

    <?php // echo $form->field($model, 'actual_start_date') ?>

    <?php // echo $form->field($model, 'actual_end_date') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
