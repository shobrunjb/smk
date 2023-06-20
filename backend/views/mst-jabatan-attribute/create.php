<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstJabatanAttribute */

$this->title = 'Tambah Jabatan Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-jabatan-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
