<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstOrganizationAttributeGrade */

$this->title = 'Tambah Organization Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-organization-attribute-grade-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
