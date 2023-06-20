<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekPenilaian */

$this->title = 'Update Aspek Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Aspek Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_aspek_penilaian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-aspek-penilaian-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
