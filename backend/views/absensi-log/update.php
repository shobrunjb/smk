<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiLog */

$this->title = 'Update Absensi Log';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_absensi_log]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body absensi-log-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
