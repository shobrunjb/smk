<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-mst-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_project_mst_type') ?>

    <?= $form->field($model, 'project_type') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
