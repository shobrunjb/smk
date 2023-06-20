<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintCeremony */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprint-ceremony-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <?= $form->field($model, 'id_sprint')->textInput() ?>

    <?= $form->field($model, 'ceremony')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noted')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'external_notes1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'external_notes2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'external_notes3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
