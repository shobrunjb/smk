<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMasterVehicle;
use yii\helpers\ArrayHelper;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
// use backend\models\AssetMaster;
/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterVehicle */
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

        <?php //= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'id_asset_code')->textInput() 
        ?>

        <?php //= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'id_account_code')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_mst_accrual')->textInput() 
        ?>
        <?php
        $listElements = AppFieldConfigSearch::getListFormElement(AssetMasterVehicle::tableName(), $form, $model);

        //Custom Elements
        $dataTypeAsset1 = ArrayHelper::map(TypeAssetItem1::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
        $elementTypeAsset1 = $form->field($model, 'id_type_asset1')->dropDownList(
            $dataTypeAsset1,
            ['prompt' => '-Pilih Type-']
        );
        $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset1", $elementTypeAsset1);

        //Custom Elements
        $dataTypeAsset2 = ArrayHelper::map(TypeAssetItem2::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
        $elementTypeAsset2 = $form->field($model, 'id_type_asset2')->dropDownList(
            $dataTypeAsset2,
            ['prompt' => '-Pilih Type-']
        );
        $listElements = AppFieldConfigSearch::replaceFormElement($listElements, "id_type_asset2", $elementTypeAsset2);

        foreach ($listElements as $formdis) {
            echo $formdis;
        }

        ?>
        <?php //= $form->field($model, 'id_type_asset1')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset2')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset3')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset4')->textInput() 
        ?>

        <?php //= $form->field($model, 'id_type_asset5')->textInput() 
        ?>

        <?php //= $form->field($model, 'attribute1')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'attribute2')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'attribute3')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'attribute4')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'attribute5')->textInput(['maxlength' => true]) 
        ?>

        <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'status')->textInput(['maxlength' => true]) 
        ?>

        <?php //= $form->field($model, 'number_series')->textInput() 
        ?>
        <?= $form->field($model, 'date')->widget(datepicker::className(), [
            'model' => $model,
            'attribute' => 'date',
            'template' => '{addon}{input}',
            //'options'=>['readonly'=>'readonly'],
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'endDate' => date('Y-m-d'),
            ]
        ]); ?>
        <?php //= $form->field($model, 'date')->textInput() 
        ?>
        <?php $dataListSupplier = yii\helpers\ArrayHelper::map(backend\models\Supplier::find()->asArray()->all(), 'id_supplier', 'nama_supplier');
        echo $form->field($model, 'id_supplier')->dropDownList(
            $dataListSupplier,
            ['prompt' => '-Pilih-']
        );
        ?>
        <?php //= $form->field($model, 'id_supplier')->textInput() 
        ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>