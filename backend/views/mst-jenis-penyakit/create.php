<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJenisPenyakit */

$this->title = 'Tambah Jenis Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-jenis-penyakit-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
