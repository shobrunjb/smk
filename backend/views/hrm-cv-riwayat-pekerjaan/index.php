<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvRiwayatPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-cv-riwayat-pekerjaan-index">

        
        <p>
            <?= Html::a('Tambah Riwayat Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'code_id',
            'nama_perusahaan',
            'jenis_pekerjaan',
            'jabatan_terakhir',
            'tahun_mulai',
            //'tahun_selesai',
            //'gaji_bruto',
            //'keterangan',
            //'created_date',
            //'created_user',
            //'created_ip_address',
            //'modified_date',
            //'modified_user',
            //'modified_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
