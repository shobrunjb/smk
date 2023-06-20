<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemVehicle */

$this->title = 'Tambah Asset Item Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body asset-item-vehicle-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
