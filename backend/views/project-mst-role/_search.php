<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-mst-role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_project_mst_role') ?>

    <?= $form->field($model, 'id_project_mst_type') ?>

    <?= $form->field($model, 'role_name') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
