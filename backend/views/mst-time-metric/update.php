<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTimeMetric */

$this->title = 'Update Mst Time Metric';
$this->params['breadcrumbs'][] = ['label' => 'Mst Time Metric', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_time_metric]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-time-metric-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
