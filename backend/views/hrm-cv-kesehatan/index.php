<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmCvKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kesehatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-cv-kesehatan-index">

        
        <p>
            <?= Html::a('Tambah Kesehatan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'code_id',
            'penyakit_diderita',
            'deskripsi_penyakit',
            'tingkat',
            'lama_sakit',
            //'ditanggung_perusahaan',
            //'tanggal_penggantian',
            //'biaya_ditanggung',
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
