<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMember */

$this->title = 'Update Project Member';
$this->params['breadcrumbs'][] = ['label' => 'Project Member', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_project_member]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body project-member-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
