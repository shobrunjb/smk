<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstEnvironmentAttributeGrade */

$this->title = 'Update Environment Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_environment_attribute_grade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-environment-attribute-grade-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
