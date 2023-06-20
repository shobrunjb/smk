<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataSekolah */

$this->title = 'Update Data Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Data Sekolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sekolah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body data-sekolah-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
