<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTingkatPendidikan */

$this->title = 'Tambah Tingkat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Tingkat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-tingkat-pendidikan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
