<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstPersonalAttribute */

$this->title = 'Update Personal Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Personal Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_personal_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-personal-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
