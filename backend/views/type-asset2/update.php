<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset2 */

$this->title = 'Update Type Asset 2';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 2', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_type_asset]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body type-asset2-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
