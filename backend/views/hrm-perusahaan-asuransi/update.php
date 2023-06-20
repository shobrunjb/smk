<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPerusahaanAsuransi */

$this->title = 'Update Perusahaan Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_hrm_perusahaan_asuransi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-perusahaan-asuransi-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
