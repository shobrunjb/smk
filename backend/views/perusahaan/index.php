<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perusahaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body perusahaan-index">

        
        <p>
            <?= Html::a('Tambah Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'perusahaan',
            'deskripsi',
            'alamat_kontak',
            'telepon_kontak',
            'email_kontak:email',
            //'active_status',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
