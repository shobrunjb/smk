<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvAsuransi */

$this->title = 'Tambah Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-cv-asuransi-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
