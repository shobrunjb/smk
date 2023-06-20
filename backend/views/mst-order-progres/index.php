<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\mstOrderProgressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mst Order Progres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-order-progres-index">

        
        <p>
            <?= Html::a('Tambah Mst Order Progres', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'order_progress',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
