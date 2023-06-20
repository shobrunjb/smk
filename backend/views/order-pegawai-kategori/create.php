<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiKategori */

$this->title = 'Tambah Order Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body order-pegawai-kategori-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
