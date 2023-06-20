<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJabatanAttributeGrade */

$this->title = 'Tambah Jabatan Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-jabatan-attribute-grade-create">
		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>


