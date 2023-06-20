<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJabatanAttributeGrade */

$this->title = 'Update Jabatan Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_jabatan_attribute_grade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-jabatan-attribute-grade-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
