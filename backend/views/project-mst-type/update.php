<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstType */

$this->title = 'Update Project Mst Type';
$this->params['breadcrumbs'][] = ['label' => 'Project Mst Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_project_mst_type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body project-mst-type-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
