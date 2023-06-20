<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\logOrderPegawai */

$this->title = 'Tambah Log Order Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Log Order Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body log-order-pegawai-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
