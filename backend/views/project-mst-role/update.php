<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstRole */

$this->title = 'Update Project Mst Role';
$this->params['breadcrumbs'][] = ['label' => 'Project Mst Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_project_mst_role]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body project-mst-role-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
