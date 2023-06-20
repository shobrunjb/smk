<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPendidikan */

$this->title = 'Update Riwayat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_riwayat_pendidikan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-cv-riwayat-pendidikan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
