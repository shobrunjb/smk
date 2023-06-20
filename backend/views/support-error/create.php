<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportError */

$this->title = 'Laporkan Error';
//$this->params['breadcrumbs'][] = ['label' => 'Support Error', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body support-error-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
