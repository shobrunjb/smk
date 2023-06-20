<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$this->title = 'Tambah Type Asset 1';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body type-asset1-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
