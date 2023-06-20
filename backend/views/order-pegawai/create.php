<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */

$this->title = 'Tambah Order TKBM';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body order-pegawai-create">

		
	    <?= $this->render('_form_with_autocomplete', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
