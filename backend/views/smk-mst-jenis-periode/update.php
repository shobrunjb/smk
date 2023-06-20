<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkMstJenisPeriode */

$this->title = 'Update Jenis Periode';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Periode', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_mst_jenis_periode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-mst-jenis-periode-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
