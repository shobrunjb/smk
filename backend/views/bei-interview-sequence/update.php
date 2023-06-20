<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSequence */

$this->title = 'Update Bei Interview Sequence';
$this->params['breadcrumbs'][] = ['label' => 'Bei Interview Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_bei_interview_sequence]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body bei-interview-sequence-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
