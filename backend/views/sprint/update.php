<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprint */

$this->title = 'Update Sprint';
$this->params['breadcrumbs'][] = ['label' => 'Sprint', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sprint]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sprint-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
