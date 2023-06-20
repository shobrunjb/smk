<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstRole */

$this->title = 'Tambah Project Mst Role';
$this->params['breadcrumbs'][] = ['label' => 'Project Mst Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body project-mst-role-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
