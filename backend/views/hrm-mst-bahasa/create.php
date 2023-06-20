<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmMstBahasa */

$this->title = 'Tambah Bahasa';
$this->params['breadcrumbs'][] = ['label' => 'Bahasa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
	<div class="box-body hrm-mst-bahasa-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>

