<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTingkatPendidikan */

$this->title = 'Update Tingkat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Tingkat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_tingkat_pendidikan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-tingkat-pendidikan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
