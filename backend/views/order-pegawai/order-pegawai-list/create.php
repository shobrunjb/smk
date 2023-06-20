<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiList */

$this->title = 'Tambah Order Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body order-pegawai-list-create">


		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>
</div>