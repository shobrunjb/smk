<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemVehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'number1') ?>

    <?= $form->field($model, 'number2') ?>

    <?= $form->field($model, 'number3') ?>

    <?php // echo $form->field($model, 'kode_barcode') ?>

    <?php // echo $form->field($model, 'qrcode') ?>

    <?php // echo $form->field($model, 'link_code') ?>

    <?php // echo $form->field($model, 'id_customer') ?>

    <?php // echo $form->field($model, 'picture1') ?>

    <?php // echo $form->field($model, 'picture2') ?>

    <?php // echo $form->field($model, 'picture3') ?>

    <?php // echo $form->field($model, 'picture4') ?>

    <?php // echo $form->field($model, 'picture5') ?>

    <?php // echo $form->field($model, 'caption_picture1') ?>

    <?php // echo $form->field($model, 'caption_picture2') ?>

    <?php // echo $form->field($model, 'caption_picture3') ?>

    <?php // echo $form->field($model, 'caption_picture4') ?>

    <?php // echo $form->field($model, 'caption_picture5') ?>

    <?php // echo $form->field($model, 'id_asset_received') ?>

    <?php // echo $form->field($model, 'id_asset_item_location') ?>

    <?php // echo $form->field($model, 'id_type_asset_item1') ?>

    <?php // echo $form->field($model, 'id_type_asset_item2') ?>

    <?php // echo $form->field($model, 'id_type_asset_item3') ?>

    <?php // echo $form->field($model, 'id_type_asset_item4') ?>

    <?php // echo $form->field($model, 'id_type_asset_item5') ?>

    <?php // echo $form->field($model, 'label1') ?>

    <?php // echo $form->field($model, 'label2') ?>

    <?php // echo $form->field($model, 'label3') ?>

    <?php // echo $form->field($model, 'label4') ?>

    <?php // echo $form->field($model, 'label5') ?>

    <?php // echo $form->field($model, 'file1') ?>

    <?php // echo $form->field($model, 'file2') ?>

    <?php // echo $form->field($model, 'file3') ?>

    <?php // echo $form->field($model, 'status_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
