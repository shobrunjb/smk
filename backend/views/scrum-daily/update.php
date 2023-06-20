<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDaily */

$this->title = 'Update Scrum Daily';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_scrum_daily]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body scrum-daily-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
