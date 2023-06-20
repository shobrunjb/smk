<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForNow */

$this->title = 'Update Scrum Daily For Now';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Now', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_scrum_daily_for_now]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body scrum-daily-for-now-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
