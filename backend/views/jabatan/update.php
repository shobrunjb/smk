<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

$this->title = 'Update Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_jabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body jabatan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
