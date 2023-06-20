<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */

$this->title = 'Update Order Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_order_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body order-pegawai-update">

		
	    <?= $this->render('_form_with_autocomplete', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
