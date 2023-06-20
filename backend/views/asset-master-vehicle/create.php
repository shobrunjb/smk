<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterVehicle */

$this->title = 'Tambah Asset Master Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-master-vehicle-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
