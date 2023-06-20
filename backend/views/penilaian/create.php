<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiTahunan */

$this->title = 'Tambah Smk Pegawai Tahunan';
$this->params['breadcrumbs'][] = ['label' => 'Smk Pegawai Tahunan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-pegawai-tahunan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
