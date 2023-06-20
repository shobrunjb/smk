<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMasterVehicle;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemVehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="asset-master-form box box-success">

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]); ?>
        <?php $dataPost = ArrayHelper::map(\backend\models\AssetMasterVehicle::find()->asArray()->all(), 'id_asset_master', 'asset_name');
        echo $form->field($model, 'id_asset_master')
            ->dropDownList(
                $dataPost,
                ['prompt' => 'Pilih Jenis...']
            );
        ?>



        <?= $form->field($model, 'number1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'number2')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'number3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'kode_barcode')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'qrcode')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'link_code')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'id_customer')->textInput() 
        ?>

        <?php //= $form->field($model, 'picture1')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'picture2')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'picture3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'picture4')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'picture5')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'caption_picture1')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'caption_picture2')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'caption_picture3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'caption_picture4')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'caption_picture5')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'id_asset_received')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_asset_item_location')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset_item1')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset_item2')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset_item3')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset_item4')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset_item5')->textInput() 
        ?>

        <?php //= $form->field($model, 'label1')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'label2')->textInput(['maxlength' => true]) 
        ?>

        <?php // = $form->field($model, 'label3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'label4')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'label5')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'file1')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'file2')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'file3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'status_active')->textInput() 
        ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>