<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProOrganizationAttribute */

$this->title = 'Tambah Organization Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pro-organization-attribute-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
