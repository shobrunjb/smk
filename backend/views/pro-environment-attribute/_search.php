<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProEnvironmentAttributeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pro-environment-attribute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pro_environment_attribute') ?>

    <?= $form->field($model, 'id_environment') ?>

    <?= $form->field($model, 'id_mst_environment_attribute') ?>

    <?= $form->field($model, 'id_mst_environment_attribute_grade') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
