<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintCeremony */

$this->title = 'Update Sprint Ceremony';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Ceremony', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sprint_ceremony]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sprint-ceremony-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
