<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawai */

$this->title = 'Update Diklat Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_diklat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body diklat-pegawai-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
