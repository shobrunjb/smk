<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiType */

$this->title = 'Tambah Absensi Type';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body absensi-type-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
