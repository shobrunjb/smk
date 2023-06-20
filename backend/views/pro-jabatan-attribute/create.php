<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProJabatanAttribute */

$this->title = 'Tambah Pro Jabatan Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Pro Jabatan Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pro-jabatan-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
