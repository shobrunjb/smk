<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTimeMetric */

$this->title = 'Tambah Mst Time Metric';
$this->params['breadcrumbs'][] = ['label' => 'Mst Time Metric', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-time-metric-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
