<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkPegawaiTahunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Smk Pegawai Tahunan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-pegawai-tahunan-index">

        
        <p>
            <?= Html::a('Tambah Smk Pegawai Tahunan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type_periode',
            'year',
            'rev_no',
            'plan_is_changed',
            'planchange_is_approved',
            //'planchange_notes:ntext',
            //'plan_is_approved',
            //'plan_approval_date',
            //'plan_approval_ip_address',
            //'plan_approval_notes:ntext',
            //'bimb_is_approved',
            //'bimb_approval_date',
            //'bimb_approval_ip_address',
            //'bimb_approval_notes:ntext',
            //'is_approved',
            //'approval_date',
            //'approval_ip_address',
            //'approval_notes:ntext',
            //'nilai_point',
            //'nilai_angka',
            //'keterangan_nilai',
            //'bmb_nilai_point',
            //'bmb_nilai_angka',
            //'bmb_keterangan_nilai',
            //'final_nilai_point',
            //'final_nilai_angka',
            //'final_keterangan_nilai',
            //'keterangan',
            //'plan_status_completed',
            //'bimb_status_completed',
            //'final_status_completed',
            //'status',
            //'filename',
            //'created_date',
            //'created_user',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
