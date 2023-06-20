<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SprintBacklogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sprint Backlog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sprint-backlog-index">

        
        <p>
            <?= Html::a('Tambah Sprint Backlog', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'start_work',
            'end_work',
            'last_contribute_user',
            'total_duration',
            'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
