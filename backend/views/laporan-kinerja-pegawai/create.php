<?php

use yii\helpers\Html;
use backend\models\LaporanKinerjaPegawai;
/* @var $this yii\web\View */
/* @var $model backend\models\LaporanKinerjaPegawai */

$this->title = 'Tambah Laporan Kinerja Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kinerja Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body laporan-kinerja-pegawai-create">
		<?php $model = new LaporanKinerjaPegawai();
		$model->id_order_pegawai = $modelList->id_order_pegawai;
		$model->id_pegawai = $modelList->id_pegawai;


		?>


		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>
</div>