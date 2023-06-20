<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawai */

$this->title = 'Tambah Diklat Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body diklat-pegawai-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
