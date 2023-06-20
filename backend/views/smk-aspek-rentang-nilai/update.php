<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkAspekRentangNilai */

$this->title = 'Update Smk Aspek Rentang Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Smk Aspek Rentang Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_aspek_rentang_nilai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-aspek-rentang-nilai-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
