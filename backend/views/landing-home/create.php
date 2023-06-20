<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LandingHome */

$this->title = 'Tambah Landing Home';
$this->params['breadcrumbs'][] = ['label' => 'Landing Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body landing-home-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
