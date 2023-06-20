<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmMstJenisTunjanganKesehatan */

$this->title = 'Tambah Jenis Tunjangan Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tunjangan Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body hrm-mst-jenis-tunjangan-kesehatan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
