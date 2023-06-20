<?php

use yii\helpers\Html;
use backend\models\MstOrganizationAttribute;
use backend\models\MstOrganizationAttributeSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

$this->title = 'Ubah Atribut Organization';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Organization', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-create">

		
	    <?= $this->render('_view_perusahaan', [
	        'model' => $model,
	    ]) ?>

	    <?php 
	    	$searchModel = new MstOrganizationAttributeSearch();
        	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	    	echo $this->render('mst-organization-attribute/_index', [
	        	'model' => $model,
	        	'searchModel' => $searchModel,
            	'dataProvider' => $dataProvider,
            	'i' => $i,
            	'status_view' => false
	    	]);

	    ?>

	</div>
</div>
