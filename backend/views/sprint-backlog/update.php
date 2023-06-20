<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintBacklog */

$this->title = 'Update Sprint Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sprint_backlog]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sprint-backlog-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
