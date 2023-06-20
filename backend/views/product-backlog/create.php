<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */

$this->title = 'Tambah Product Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Product Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body product-backlog-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
