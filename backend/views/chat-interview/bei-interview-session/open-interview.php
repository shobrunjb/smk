<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\utils\EncryptionUtil;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Interview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-session-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <?= Html::a('Mulai Sesi Interview', ['start-interview'], ['class' => 'btn btn-success btn-flat']) ?>


    </div> 

    <div class="box-body">
        <div class="alert alert-info">
            Bagian bawah ini merupakan daftar sesi interview sebelumnya jika anda pernah mengikuti sebelumnya.
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
                       'label'=>'Detail Harian',
                       'format' => 'raw',
                       'value'=>function ($data) {
                           $id = EncryptionUtil::staticEncryptor("encrypt",$data->id_bei_interview_session);
                           //return Html::a('Go Interview', ['interview', 'i' => $data->id_bei_interview_session], ['class' => 'btn btn-sm btn-success']);
                           return Html::a('Go Interview', ['interview', 'i' => $id], ['class' => 'btn btn-sm btn-success']);
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