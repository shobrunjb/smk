<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

$this->title = 'Tambah Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body jabatan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
