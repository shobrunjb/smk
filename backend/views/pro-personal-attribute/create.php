<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProPersonalAttribute */

$this->title = 'Tambah Pro Personal Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Pro Personal Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pro-personal-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
