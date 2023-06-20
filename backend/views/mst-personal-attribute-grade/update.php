<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttributeGrade */

$this->title = 'Update Personal Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_personal_attribute_grade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-personal-attribute-grade-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
