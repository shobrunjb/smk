<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstOrganizationAttributeGrade */

$this->title = 'Update Organization Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_organization_attribute_grade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-organization-attribute-grade-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
