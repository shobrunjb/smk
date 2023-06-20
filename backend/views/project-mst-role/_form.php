<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-mst-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project_mst_type')->textInput() ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
