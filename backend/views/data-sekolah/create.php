<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataSekolah */

$this->title = 'Tambah Data Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Data Sekolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body data-sekolah-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
