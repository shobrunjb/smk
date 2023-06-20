<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
// use app\models\HrmKantor;
// use app\models\HrmKantorKategori;
use app\models\Perusahaan;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\HrmPegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
    .form-group {
        margin-bottom: 0px;
    }
    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
</style>


<button class="btn btn-warning btn-flat" data-toggle="collapse" data-target="#demo">Advance Search <i class="fa fa-search"></i></button>

<div id="demo" class="hrm-pegawai-search collapse" style="margin-top: 20px;">
    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['update-condition'],
        'method' => 'get',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]);
    ?>
    <?php
	/*
	$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); 
	*/
	?>

    <?php $form->field($model, 'kode') ?>

    <?= $form->field($model, 'perusahaan') ?>

	<div class="box-footer clearfix" style="margin-left: 17.5%;">
		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
	</div>

    <?php //ActiveForm::end(); ?>
	<?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
