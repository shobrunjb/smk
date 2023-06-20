<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiTahunan */

$this->title = 'Update Smk Pegawai Tahunan';
$this->params['breadcrumbs'][] = ['label' => 'Smk Pegawai Tahunan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_pegawai_tahunan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-pegawai-tahunan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
