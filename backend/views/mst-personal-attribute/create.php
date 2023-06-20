<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttribute */

$this->title = 'Tambah Personal Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-personal-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
