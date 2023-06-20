<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstEnvironmentAttributeGrade */

$this->title = 'Tambah Environment Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-environment-attribute-grade-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
