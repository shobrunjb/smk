<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\mstOrderProgres */

$this->title = 'Tambah Mst Order Progres';
$this->params['breadcrumbs'][] = ['label' => 'Mst Order Progres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-order-progres-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
