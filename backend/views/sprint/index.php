<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SprintSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sprint';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sprint-index">

        
        <p>
            <?= Html::a('Tambah Sprint', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'sprint_number',
            'sprint_code',
            'duration_in_week',
            'start_date',
            'end_date',
            //'note:ntext',
            //'is_active',
            //'is_locked',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
