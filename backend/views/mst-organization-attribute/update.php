<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstOrganizationAttribute */

$this->title = 'Update Organization Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_organization_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-organization-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
