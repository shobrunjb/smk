<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perusahaan */

$this->title = 'Tambah Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body perusahaan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
