<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportError */

$this->title = 'Update Support Error';
$this->params['breadcrumbs'][] = ['label' => 'Support Error', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_support_error]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body support-error-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
