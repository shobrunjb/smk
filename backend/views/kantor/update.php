<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */

$this->title = 'Update Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_kantor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body kantor-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
