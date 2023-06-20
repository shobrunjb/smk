<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perusahaan */

$this->title = 'Update Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_perusahaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body perusahaan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
