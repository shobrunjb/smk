<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */

$this->title = 'Tambah Smk Aspek Rencana';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Rencana', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-aspek-rencana-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
