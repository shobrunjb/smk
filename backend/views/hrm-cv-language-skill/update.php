<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvLanguageSkill */

$this->title = 'Update Language Skill';
$this->params['breadcrumbs'][] = ['label' => 'Language Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_language_skill]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body hrm-cv-language-skill-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
