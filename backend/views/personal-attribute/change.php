<?php

use yii\helpers\Html;
use backend\models\MstPersonalAttribute;
use backend\models\MstPersonalAttributeSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

$this->title = 'Ubah Atribut Personal';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-create">

		
	    <?= $this->render('_view_pegawai', [
	        'model' => $model,
	    ]) ?>

	    <?php 
	    	$searchModel = new MstPersonalAttributeSearch();
        	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	    	echo $this->render('mst-personal-attribute/_index', [
	        	'model' => $model,
	        	'searchModel' => $searchModel,
            	'dataProvider' => $dataProvider,
            	'i' => $i,
            	'status_view' => false
	    	]);

	    ?>

	</div>
</div>