<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataJurusan */

$this->title = 'Tambah Data Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Data Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body data-jurusan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
