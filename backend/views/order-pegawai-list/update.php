<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiList */

$this->title = 'Update Order Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_order_pegawai_list]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body order-pegawai-list-update">


		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>
</div>