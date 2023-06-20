<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstEnvironmentAttribute */

$this->title = 'Update Environment Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_environment_attribute]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-environment-attribute-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
