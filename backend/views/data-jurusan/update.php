<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataJurusan */

$this->title = 'Update Data Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Data Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_jurusan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body data-jurusan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
