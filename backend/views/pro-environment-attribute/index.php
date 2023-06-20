<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProEnvironmentAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Environment Attribute';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body pro-environment-attribute-index">

        
        <p>
            <?= Html::a('Tambah Environment Attribute', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'created_date',
            'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
