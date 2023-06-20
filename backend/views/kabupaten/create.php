<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = 'Tambah Kabupaten';
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body kabupaten-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
