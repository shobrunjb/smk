<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPerusahaanAsuransi */

$this->title = 'Tambah Perusahaan Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-perusahaan-asuransi-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
