<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkJenisPenilaian */

$this->title = 'Update Smk Jenis Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Smk Jenis Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_smk_jenis_penilaian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body smk-jenis-penilaian-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
