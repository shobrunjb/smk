<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_perusahaan')->textInput() ?>

    <?= $form->field($model, 'id_project_mst_type')->textInput() ?>

    <?= $form->field($model, 'kode_proyek')->textInput() ?>

    <?= $form->field($model, 'nama_proyek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'backlog_is_locked')->textInput() ?>

    <?= $form->field($model, 'repo_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repo6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_start_date')->textInput() ?>

    <?= $form->field($model, 'plan_end_date')->textInput() ?>

    <?= $form->field($model, 'actual_start_date')->textInput() ?>

    <?= $form->field($model, 'actual_end_date')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
