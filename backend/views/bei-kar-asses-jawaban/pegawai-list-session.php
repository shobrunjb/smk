<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\common\utils\EncryptionUtil;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Interview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-session-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">


    </div> 

    <div class="box-body">
        <div class="alert alert-info">
            Silakan pilih sesi mana yang sudah dikerjakan oleh peserta.
        </div>
        <div class="box-body table-responsive no-padding">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_bei_interview_session',
                    //'id_pegawai',
                    'session_date',
                    //'last_position',
                    //'last_question:ntext',
                    //'last_hit',
                    'actual_start',
                    'actual_end',
                    'durasi',
                    'status',
                    [
                       'label'=>'Cek Hasil',
                       'format' => 'raw',
                       'value'=>function ($data) {
                           $id = EncryptionUtil::staticEncryptor("encrypt",$data->id_bei_interview_session);
                           //return Html::a('Go Interview', ['interview', 'i' => $data->id_bei_interview_session], ['class' => 'btn btn-sm btn-success']);
                           return Html::a('Cek Hasil', ['list-hasil', 'i' => $id], ['class' => 'btn btn-sm btn-success']);
                        },
                    ],
                    [
                       'label'=>'Check By AI',
                       'format' => 'raw',
                       'value'=>function ($data) {
                           $id = EncryptionUtil::staticEncryptor("encrypt",$data->id_bei_interview_session);
                           //return Html::a('Go Interview', ['interview', 'i' => $data->id_bei_interview_session], ['class' => 'btn btn-sm btn-success']);
                           return Html::a('Chekc By AI', ['count-score', 'i' => $id], ['class' => 'btn btn-sm btn-warning']);
                        },
                    ],
                    [
                       'label'=>'Hitung Score By AI',
                       'format' => 'raw',
                       'value'=>function ($data) {
                           $id = EncryptionUtil::staticEncryptor("encrypt",$data->id_bei_interview_session);
                           //return Html::a('Go Interview', ['interview', 'i' => $data->id_bei_interview_session], ['class' => 'btn btn-sm btn-success']);
                           return Html::a('Hitung Score Hasil', ['predict-score', 'i' => $id], ['class' => 'btn btn-sm btn-danger']);
                        },
                    ],
                    //'last_submit',
                    //'stat_total_number_question',
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
</div>