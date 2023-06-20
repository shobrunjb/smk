<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPublik */

$this->title = 'Update Landing Asset';
$this->params['breadcrumbs'][] = ['label' => 'Landing Asset', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_landing_asset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body informasi-publik-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
