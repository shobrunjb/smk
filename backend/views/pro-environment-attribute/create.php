<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProEnvironmentAttribute */

$this->title = 'Tambah Environment Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pro-environment-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
