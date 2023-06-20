<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRentangNilai */

$this->title = 'Tambah Smk Aspek Rentang Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Rentang Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body smk-aspek-rentang-nilai-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
