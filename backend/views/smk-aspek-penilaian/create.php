<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekPenilaian */

$this->title = 'Tambah Aspek Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Aspek Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-aspek-penilaian-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
