<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPendidikan */

$this->title = 'Tambah Riwayat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-cv-riwayat-pendidikan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
