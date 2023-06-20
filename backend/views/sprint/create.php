<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprint */

$this->title = 'Tambah Sprint';
$this->params['breadcrumbs'][] = ['label' => 'Sprint', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sprint-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
