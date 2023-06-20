<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'sprint_number')->textInput() ?>

    <?= $form->field($model, 'sprint_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration_in_week')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'is_locked')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
