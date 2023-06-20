<?php

use yii\helpers\Html;
use backend\models\MstEnvironmentAttribute;
use backend\models\MstEnvironmentAttributeSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

$this->title = 'Ubah Atribut Environment';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Environment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-create">

		
	    <?= $this->render('_view_kabupaten', [
	        'model' => $model,
	    ]) ?>

	    <?php 
	    	$searchModel = new MstEnvironmentAttributeSearch();
        	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	    	echo $this->render('mst-environment-attribute/_index', [
	        	'model' => $model,
	        	'searchModel' => $searchModel,
            	'dataProvider' => $dataProvider,
            	'i' => $i,
            	'status_view' => false
	    	]);

	    ?>

	</div>
</div>
