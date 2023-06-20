<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body project-index">

        
        <p>
            <?= Html::a('Tambah Project', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'kode_proyek',
            'nama_proyek',
            'description:ntext',
            'is_active',
            'backlog_is_locked',
            //'repo_code',
            //'repo1',
            //'repo2',
            //'repo3',
            //'repo4',
            //'repo5',
            //'repo6',
            //'plan_start_date',
            //'plan_end_date',
            //'actual_start_date',
            //'actual_end_date',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
