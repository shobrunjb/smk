<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisTunjanganKesehatan */

$this->title = 'Update Jenis Tunjangan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tunjangan Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_jenis_tunjangan_kesehatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-tunjangan-kesehatan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
