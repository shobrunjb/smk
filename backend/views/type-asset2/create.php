<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset2 */

$this->title = 'Tambah Type Asset 2';
$this->params['breadcrumbs'][] = ['label' => 'Type Asset 2', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body type-asset2-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
