<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPeriode */

$this->title = 'Tambah Periode Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Smk Periode', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-periode-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
