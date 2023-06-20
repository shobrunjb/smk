<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiLog */

$this->title = 'Tambah Absensi Log';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body absensi-log-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
