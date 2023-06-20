<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiType */

$this->title = 'Update Absensi Type';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_absensi_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body absensi-type-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
