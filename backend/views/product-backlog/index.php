<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductBacklogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Backlog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body product-backlog-index">

        
        <p>
            <?= Html::a('Tambah Product Backlog', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'order_number',
            'product_backlog',
            'description:ntext',
            'external_information',
            'priority',
            //'load_estimatation',
            //'progres_by_team',
            //'progres_by_owner',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
