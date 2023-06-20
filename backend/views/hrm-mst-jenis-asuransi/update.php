<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAsuransi */

$this->title = 'Update Jenis Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_hrm_mst_jenis_asuransi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-asuransi-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
