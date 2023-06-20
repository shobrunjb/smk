<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiKategori */

$this->title = 'Update Order Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_order_pegawai_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body order-pegawai-kategori-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
