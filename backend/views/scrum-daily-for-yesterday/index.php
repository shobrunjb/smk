<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScrumDailyForYesterdaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scrum Daily For Yesterday';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body scrum-daily-for-yesterday-index">

        
        <p>
            <?= Html::a('Tambah Scrum Daily For Yesterday', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'progres',
            'created_date',
            'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
