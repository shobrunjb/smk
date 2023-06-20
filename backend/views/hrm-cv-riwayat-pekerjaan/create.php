<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPekerjaan */

$this->title = 'Tambah Riwayat Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-cv-riwayat-pekerjaan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
