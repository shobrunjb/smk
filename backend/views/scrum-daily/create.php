<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDaily */

$this->title = 'Tambah Scrum Daily';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body scrum-daily-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
