<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemVehicle */

$this->title = 'Update Asset Item Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_asset_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body asset-item-vehicle-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
