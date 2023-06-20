<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProOrganizationAttributeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pro-organization-attribute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pro_organization_attribute') ?>

    <?= $form->field($model, 'id_organization') ?>

    <?= $form->field($model, 'id_mst_organization_attribute') ?>

    <?= $form->field($model, 'id_mst_organization_attribute_grade') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
