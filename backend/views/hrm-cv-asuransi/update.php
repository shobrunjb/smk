<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvAsuransi */

$this->title = 'Update Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_cv_asuransi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-cv-asuransi-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
