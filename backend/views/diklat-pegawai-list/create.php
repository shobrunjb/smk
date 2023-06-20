<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiList */

$this->title = 'Tambah Diklat Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body diklat-pegawai-list-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
