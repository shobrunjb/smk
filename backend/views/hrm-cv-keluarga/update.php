<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKeluarga */

$this->title = 'Update Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_keluarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-cv-keluarga-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
