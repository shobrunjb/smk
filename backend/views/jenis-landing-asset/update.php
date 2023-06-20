<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisLaporan */

$this->title = 'Update Jenis Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_jenis_laporan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body jenis-Laporan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
