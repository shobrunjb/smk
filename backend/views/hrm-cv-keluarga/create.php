<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKeluarga */

$this->title = 'Tambah Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-cv-keluarga-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
