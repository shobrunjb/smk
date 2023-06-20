<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-cv-keluarga-index">

        
        <p>
            <?= Html::a('Tambah Keluarga', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'code_id',
            'kategori',
            'nama_lengkap',
            'foto',
            'tempat_lahir',
            //'tanggal_lahir',
            //'usia',
            //'usia_lebih_bulan',
            //'jenis_kelamin',
            //'status',
            //'pekerjaan',
            //'tanggal_menikah',
            //'tanggal_bercerai',
            //'tanggal_meninggal',
            //'golongan_darah',
            //'agama',
            //'status_pernikahan',
            //'status_tunjangan',
            //'tanggal_tunjangan',
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
