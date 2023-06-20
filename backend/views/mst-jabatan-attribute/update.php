<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJabatanAttribute */

$this->title = 'Update Jabatan Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_jabatan_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-jabatan-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
