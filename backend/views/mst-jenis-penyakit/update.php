<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJenisPenyakit */

$this->title = 'Update Jenis Penyakit';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Penyakit', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_jenis_penyakit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-jenis-penyakit-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
