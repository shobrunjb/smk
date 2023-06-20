<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterVehicle */

$this->title = 'Update Asset Master Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_asset_master]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body asset-master-vehicle-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
