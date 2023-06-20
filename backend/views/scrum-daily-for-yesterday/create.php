<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForYesterday */

$this->title = 'Tambah Scrum Daily For Yesterday';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Yesterday', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body scrum-daily-for-yesterday-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
