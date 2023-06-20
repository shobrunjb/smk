<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = 'Tambah Project';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body project-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
