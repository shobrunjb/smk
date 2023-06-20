<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiKategori */

$this->title = 'Update Diklat Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_diklat_pegawai_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body diklat-pegawai-kategori-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
