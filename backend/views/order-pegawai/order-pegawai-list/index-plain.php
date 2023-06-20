<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\OrderPegawaiList;
use backend\models\OrderPegawaiListSearch;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$petunjuk_admin = "";
$petunjuk_member = "";

/*
Bagian ini diisi oleh pegawai. Pastikan bahwa pegawai atau ketua tim telah mengisi dengan baik<br>
                Untuk melihat catatan aktivitas persiapan dapat dilihat pada bagian list aktivitas persiapan.<br><Br>
                Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.


Silakan isi dengan informasi terkait persiapan di bagian log aktivitas pekerjaan. <br>
                Jika masa persiapan sudah selesai, maka pilih tombol "SIMPAN DAN LANJUTKAN STEP".<Br><Br>
                Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.
*/

if(isset($_petunjuk_admin)) {
    $petunjuk_admin = $_petunjuk_admin;
}
if(isset($_petunjuk_member)) {
    $petunjuk_member = $_petunjuk_member;
}

?>
<div class="boxs">
    <div class="box-body order-pegawai-list-index">
        <?php 
            $level = Yii::$app->user->identity->user_level;
            if($level == "admin"){
        ?>
            <div class="callout callout-warning">
                <h4>Petunjuk</h4>
                <p><?= $petunjuk_admin ?>
                </p>
            </div>
        <?php
            }
        ?>

        <?php
            if($level == "member"){
        ?>
            <div class="callout callout-info">
                <h4>Petunjuk</h4>
                <p><?= $petunjuk_member ?>
            </p>
            </div>
        <?php
            }
        ?>
        <?php /*
        <p>
            <?= Html::a('Tambah TKBM', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        */ ?>

        <?php
        $model = new OrderPegawaiList();
        $model->id_order_pegawai = $model_order->id_order_pegawai;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo '<div class="alert alert-success">Tambah data karyawan berhasil!</div>';

            //Ubah status karyawan menjadi bekerja
            if (($modelPegawai = \backend\models\HrmPegawai::findOne($model->id_pegawai)) !== null) {
                $modelPegawai->id_hrm_status_pegawai = 2;
                $modelPegawai->save(false);
            }
        }
        ?>
        <!-- <div class="row">
            <div style="margin-left : 10px; margin-right : 10px" class="col">
                <div style="margin-left : 10px; margin-right : 10px" class="box-tools pull-left">
                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#modal-form-data">
                        <span class="fa fa-plus"></span> Tambah Pegawai
                    </button>
                </div>
            </div> -->


        <!-- <div class="modal fade" id="modal-form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            // echo $this->render('_form', [
                            //   'model' => $model,
                            // ]) 
                            ?>
                        </div>
                    </div>
                </div>
            </div> -->



        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?php
            $collapsedbox = "collapsed-box";
            if(isset($show_full_pegawai)){
                if($show_full_pegawai == true){
                    $collapsedbox = "";
                }
            }
        ?>

        <div class="box box-success <?= $collapsedbox ?>">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Pegawai yang bertugas</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'panel' => ['type' => 'success', 'heading' => '<span class="fa fa-ship"></span> Daftar pegawai yang bertugas'],
                    'columns' => [
                        [
                            'header' => 'No',
                            'class' => 'yii\grid\SerialColumn',
                            'contentOptions' => ['style' => 'vertical-align: top; ', 'class' => 'text-left'],

                        ],
                        // 'id_order_pegawai_list',
                        // 'id_order_pegawai',
                        'pegawai.nama_lengkap',


                        // [
                        //     'label' => 'Action',
                        //     'format' => 'raw',
                        //     //'value' => function ($data) use ($ip) {
                        //     'value' => function ($data) {
                        //         $i = $data->id_order_pegawai_list;
                        //         //if($data->status_order == 'BELUM'){

                        //         return Html::a(
                        //             '<i class="fa fa-fw fa-trash"></i> Delete',
                        //             ['order-pegawai-list/delete', 'id' => $i],
                        //             ['class' => 'btn btn-danger btn-xs']
                        //         );
                        //         //}
                        //     }
                        // ],
                    ],
                ]); ?>
            </div>
        </div>
        <!-- <div style="margin-left : 10px; margin-right : 10px" class="col">
                <div class="box-tools pull-left">
                    <?php //= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-order-list-pegawai', 'i' => $i], ['class' => 'btn btn-primary']) 
                    ?>
                </div>
            </div> -->

    </div>
</div>