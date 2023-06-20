<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\InformasiPublik */

$this->title = 'Tambah Landing Asset';
$this->params['breadcrumbs'][] = ['label' => 'Landing Asset', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body laporan-publik-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
