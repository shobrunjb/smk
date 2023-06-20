<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\mstOrderProgres */

$this->title = 'Update Mst Order Progres';
$this->params['breadcrumbs'][] = ['label' => 'Mst Order Progres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_order_progres]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-order-progres-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
