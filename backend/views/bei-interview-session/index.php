<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Interview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-session-index box box-primary">

 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <div class="box-header with-border">
        <?= Html::a('Tambah Sesi Interview', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div> -->

    <div class="box-body table-responsive no-padding">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            //'id_bei_interview_session',
                
                [
                    'label'=>'Nama Pegawai',
                    'attribute' => 'id_pegawai',
                    'value' => 'pegawai.nama_lengkap',
                ],
                'session_date',
            //'last_position',
            //'last_question:ntext',
            //'last_hit',
                'actual_start',
                'actual_end',
                'durasi',
                'status',
            //'last_submit',
                'stat_total_number_question',
            //'created_date',
            //'created_user',
            //'created_ip_address',
            //'modified_date',
            //'modified_user',
            //'modified_ip_address',

           // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>