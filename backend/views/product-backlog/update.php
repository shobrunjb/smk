<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */

$this->title = 'Update Product Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Product Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_product_backlog]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body product-backlog-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
