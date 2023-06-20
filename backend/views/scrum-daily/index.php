<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScrumDailySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scrum Daily';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body scrum-daily-index">

        
        <p>
            <?= Html::a('Tambah Scrum Daily', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'standup_date',
            'yesterday_todo',
            'today_todo',
            'obstacle',
            'yesterday_bukti',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
