<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisAsuransi */

$this->title = 'Tambah Jenis Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-asuransi-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
