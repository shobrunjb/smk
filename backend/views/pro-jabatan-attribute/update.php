<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProJabatanAttribute */

$this->title = 'Update Pro Jabatan Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Pro Jabatan Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_pro_jabatan_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body pro-jabatan-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
