<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\logOrderPegawai */

$this->title = 'Update Log Order Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Log Order Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_log_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body log-order-pegawai-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
