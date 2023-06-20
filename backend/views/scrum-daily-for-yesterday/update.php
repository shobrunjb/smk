<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForYesterday */

$this->title = 'Update Scrum Daily For Yesterday';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Yesterday', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_scrum_daily_for_yesterday]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body scrum-daily-for-yesterday-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
