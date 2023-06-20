<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiKategori */

$this->title = 'Tambah Diklat Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body diklat-pegawai-kategori-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
