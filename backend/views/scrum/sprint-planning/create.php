<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */

$this->title = 'Tambah Sprint';
$this->params['breadcrumbs'][] = ['label' => 'Product Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boxs">
	<div class="box-bodys product-backlog-create">
		<div class="callout callout-info">
			<p><B>Tambah Product Backlog</B></p>
		</div>
	    <?= $this->render('_form', [
	        'model' => $model,
	        't' => $t,
            'i' => $i,
            'idi' => $idi,
	    ]) ?>

	</div>
</div>
