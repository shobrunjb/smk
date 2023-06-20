<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmPerusahaanAsuransiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perusahaan Asuransi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-perusahaan-asuransi-index">

        
        <p>
            <?= Html::a('Tambah Perusahaan Asuransi', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'perusahaan_asuransi',
            'deskripsi',
            'alamat_kontak',
            'telepon_kontak',
            'email_kontak:email',
            //'active_status',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
