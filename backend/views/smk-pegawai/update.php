<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawai */

$this->title = 'Isi Penilaian Kinerja Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Smk Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-pegawai-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
