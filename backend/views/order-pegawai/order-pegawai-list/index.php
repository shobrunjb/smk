<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\OrderPegawaiList;
use backend\models\OrderPegawaiListSearch;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="box">
    <div class="box-body order-pegawai-list-index">
        <div class="callout callout-info">
            <h4>Petunjuk</h4>
            <p>Silakan pegawai yang available untuk bisa ambil bagian terlibat dalam order ini.</p>
        </div>
        <?php /*
        <p>
            <?= Html::a('Tambah TKBM', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        */ ?>

        <?php
        $model = new OrderPegawaiList();
        $model->id_order_pegawai = $model_order->id_order_pegawai;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Menambahkan data pegawai pada order telah berhasil!</div>
            ';

            //Ubah status karyawan menjadi bekerja
            if (($modelPegawai = \backend\models\HrmPegawai::findOne($model->id_pegawai)) !== null) {
                $modelPegawai->id_hrm_status_pegawai = 2;
                $modelPegawai->save(false);
            }
        }
        ?>
        <div class="row">
            <div style="margin-left : 10px; margin-right : 10px" class="col">
                <div style="margin-left : 10px; margin-right : 10px" class="box-tools pull-left">
                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#modal-form-data">
                        <span class="fa fa-plus"></span> Tambah Pegawai
                    </button>
                </div>
            </div>

        </div>

        <div class="x">
            <br>
            <div class="modal fade" id="modal-form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo $this->render('_form', [
                                'model' => $model,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
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
                        'label' => 'Action',
                        'format' => 'raw',
                        //'value' => function ($data) use ($ip) {
                        'value' => function ($data) {
                            $i = $data->id_order_pegawai_list;
                            //if($data->status_order == 'BELUM'){

                            return Html::a(
                                '<i class="fa fa-fw fa-trash"></i> Delete',
                                ['order-pegawai/delete-pegawai', 'id' => $i],
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
</div>