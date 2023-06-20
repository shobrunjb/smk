<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\OrderPegawaiList;
use backend\models\LaporanKinerjaPegawai;
use backend\models\OrderPegawaiListSearch;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="box">
    <div class="box-body order-pegawai-list-index">

        <?php /*
        <p>
            <?= Html::a('Tambah TKBM', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        */ ?>

        <?php
        $model = new OrderPegawaiList();
        $model->id_order_pegawai = $model_order->id_order_pegawai;


        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-ship"></span> Daftar pegawai yang bertugas'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn',
                    'contentOptions' => ['style' => 'vertical-align: top; ', 'class' => 'text-left'],

                ],
                // 'id_order_pegawai_list',
                // 'id_order_pegawai',
                'pegawai.nama_lengkap',
                [
                    'label' => 'Laporan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $j = $data->id_order_pegawai;
                        $k = $data->id_pegawai;

                        $kinerja = LaporanKinerjaPegawai::find()
                        ->where(['id_pegawai' => $k, 'id_order_pegawai'=>$j])
                        ->one();
                        if($kinerja != null){
                            return $kinerja->deskripsi;
                        }else{
                            return "--";
                        }
                    }
                ],

                [
                    'label' => 'Action',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = $data->id_order_pegawai_list;
                        $j = $data->id_order_pegawai;
                        $k = $data->id_pegawai;

                        return Html::a(
                            '<i class="fa fa-fw fa-list"></i> Lapor',
                            ['laporan-kinerja-pegawai/laporan', 'id' => $i],
                            ['class' => 'btn btn-danger btn-xs']
                        );
                        //}
                    }
                ],
            ],
        ]); ?>
        <!-- <div style="margin-left : 10px; margin-right : 10px" class="col">
                <div class="box-tools pull-left">
                    <?php //= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-order-list-pegawai', 'i' => $i], ['class' => 'btn btn-primary']) 
                    ?>
                </div>
            </div> -->

    </div>
</div>