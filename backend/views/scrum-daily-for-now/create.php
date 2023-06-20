<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForNow */

$this->title = 'Tambah Scrum Daily For Now';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Now', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body scrum-daily-for-now-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
