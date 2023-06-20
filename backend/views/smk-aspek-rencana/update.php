<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */

$this->title = 'Update Smk Aspek Rencana';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Rencana', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_aspek_rencana]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-aspek-rencana-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
