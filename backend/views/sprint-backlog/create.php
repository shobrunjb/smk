<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintBacklog */

$this->title = 'Tambah Sprint Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sprint-backlog-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
