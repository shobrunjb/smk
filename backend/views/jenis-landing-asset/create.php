<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisLaporan */

$this->title = 'Tambah Jenis Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Laporan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body jenis-Laporan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
