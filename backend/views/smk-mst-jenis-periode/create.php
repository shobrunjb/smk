<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkMstJenisPeriode */

$this->title = 'Tambah Jenis Periode';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Periode', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-mst-jenis-periode-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
