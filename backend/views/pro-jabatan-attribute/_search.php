<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProJabatanAttributeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pro-jabatan-attribute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pro_jabatan_attribute') ?>

    <?= $form->field($model, 'id_jabatan') ?>

    <?= $form->field($model, 'id_mst_jabatan_attribute') ?>

    <?= $form->field($model, 'id_mst_jabatan_attribute_grade') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
