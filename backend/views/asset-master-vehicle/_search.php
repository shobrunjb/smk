<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterVehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-master-vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'asset_name') ?>

    <?= $form->field($model, 'id_asset_code') ?>

    <?= $form->field($model, 'asset_code') ?>

    <?= $form->field($model, 'id_account_code') ?>

    <?php // echo $form->field($model, 'id_mst_accrual') ?>

    <?php // echo $form->field($model, 'id_type_asset1') ?>

    <?php // echo $form->field($model, 'id_type_asset2') ?>

    <?php // echo $form->field($model, 'id_type_asset3') ?>

    <?php // echo $form->field($model, 'id_type_asset4') ?>

    <?php // echo $form->field($model, 'id_type_asset5') ?>

    <?php // echo $form->field($model, 'attribute1') ?>

    <?php // echo $form->field($model, 'attribute2') ?>

    <?php // echo $form->field($model, 'attribute3') ?>

    <?php // echo $form->field($model, 'attribute4') ?>

    <?php // echo $form->field($model, 'attribute5') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'number_series') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'id_supplier') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
