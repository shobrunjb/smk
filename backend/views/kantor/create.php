<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */

$this->title = 'Tambah Kantor';
$this->params['breadcrumbs'][] = ['label' => 'Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body kantor-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
