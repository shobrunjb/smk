<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintCeremony */

$this->title = 'Tambah Sprint Ceremony';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Ceremony', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sprint-ceremony-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
