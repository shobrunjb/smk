<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRencana */

$this->title = 'Tambah Rencana Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Perencanaan Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body perencanaan-penilaian-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
