<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTimeMetric */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-time-metric-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'time_metric_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_metric_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
