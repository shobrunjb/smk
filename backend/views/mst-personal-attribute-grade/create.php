<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttributeGrade */

$this->title = 'Tambah Personal Attribute Grade';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute Grade', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-personal-attribute-grade-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
