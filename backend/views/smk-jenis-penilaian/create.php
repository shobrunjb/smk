<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkJenisPenilaian */

$this->title = 'Tambah Smk Jenis Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Smk Jenis Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-jenis-penilaian-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
