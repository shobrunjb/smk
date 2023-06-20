<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPekerjaan */

$this->title = 'Update Riwayat Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_riwayat_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-cv-riwayat-pekerjaan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
