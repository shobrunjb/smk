<?php

use yii\helpers\Html;
// use yii\helpers\Html;
use kartik\grid\GridView;
use common\utils\EncryptionDB;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LaporanKinerjaPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kinerja Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body laporan-kinerja-pegawai-index">


        <p>
            <?php //= Html::a('Tambah Laporan Kinerja Pegawai', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span><span class="fa fa-pencil"></span> Daftar Laporan Kinerja'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'order.nomor_order',
                'pegawai.nama_lengkap',
                'deskripsi',
                // [
                //     'class' => 'yii\grid\ActionColumn',
                //     'template' => ' {status-action}',  // the default buttons + your custom button
                //     'header' => 'Detail',
                //     'buttons' => [
                //         'status-action' => function ($url, $model, $key) {     // render your custom button
                //             $ic = EncryptionDB::encryptor('encrypt', $model->id_laporan_kinerja);
                //             $urlpeta = Url::toRoute(['/laporan-kinerja-pegawai-admin/view', 'i' => $ic]);
                //             return Html::a('Detail', $urlpeta, ['class' => 'btn btn-sm btn-primary']);
                //         }
                //     ]
                // ],

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>