<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = 'Update Kabupaten';
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_kabupaten]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body kabupaten-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
