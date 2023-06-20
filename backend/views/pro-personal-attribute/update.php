<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProPersonalAttribute */

$this->title = 'Update Pro Personal Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Pro Personal Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_pro_personal_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body pro-personal-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
