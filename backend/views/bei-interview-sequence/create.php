<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSequence */

$this->title = 'Tambah Bei Interview Sequence';
$this->params['breadcrumbs'][] = ['label' => 'Bei Interview Sequence', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body bei-interview-sequence-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
