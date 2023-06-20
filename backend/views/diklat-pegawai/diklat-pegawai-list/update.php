<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiList */

$this->title = 'Update Diklat Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_peserta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body diklat-pegawai-list-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
