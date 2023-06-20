<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstTimeMetricSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mst Time Metric';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-time-metric-index">

        
        <p>
            <?= Html::a('Tambah Mst Time Metric', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'time_metric_id',
            'time_metric_en',
            'description:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
