<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LandingHome */

$this->title = 'Update Landing Home';
$this->params['breadcrumbs'][] = ['label' => 'Landing Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_landing_home]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body landing-home-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
