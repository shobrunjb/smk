<?php

use backend\models\LogOrderPegawaiSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\OrderPegawaiList;
use backend\models\OrderPegawaiListSearch;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */

//$this->title = $model->id_order_pegawai;
$this->title = 'Detail ' . 'Order Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai', 'url' => ['order-pegawai-list-member/index-member']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body order-pegawai-view">
        <?php

        echo $this->render('/order-pegawai/_step', [
            //'model' => $model,
            'step_ke' => $model->id_mst_order_progres, //Step ke-
        ]);
        ?>

        <?php

        echo $this->render('/order-pegawai/_view_detail_order', [
            'model' => $model,
        ]);
        ?>

        <?php
        //Di bagian sini nanti ditampilkan atau dirender berdasarkan status mst_order_progres
        //echo $model->id_mst_order_progres;
        switch ($model->id_mst_order_progres) {
            case 2: //Pilih TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $_petunjuk_member = 'Bagian ini diisi oleh admin. Silakan ketua tim memastikan anggota timnya sudah tepat atau belum';
                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member,
                    'show_full_pegawai' => true
                ]);
                // untuk menambahkan log kerja 
                /*
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                ]);
                */
                break;
            case 3: //Persiapan
                //Data TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $_petunjuk_member = 'Silakan isi dengan informasi terkait persiapan di bagian log aktivitas pekerjaan. <br>
                            Jika masa persiapan sudah selesai, maka pilih tombol "SIMPAN DAN LANJUTKAN STEP".<Br><Br>
                            Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.';

                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member
                ]);
                // Data Log Kerja
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    'log_title' => 'Catatan Aktivitas Persiapan'
                ]);
        ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">

                        <?= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-pilih-tkbm', 'i' => $i], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php
                break;
            case 4: //Mulai Tugas
                //Data TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $_petunjuk_member = 'Silakan isi dengan informasi terkait mulai tugas di bagian log aktivitas. <br>
                            Jika masa mulai tugas sudah selesai, maka pilih tombol "SIMPAN DAN LANJUTKAN STEP".<Br><Br>
                            Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.';

                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member
                ]);
                // Data Log Kerja
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    'log_title' => 'Catatan Aktivitas Mulai Tugas'
                ]);
            ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">

                        <?= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-persiapan', 'i' => $i], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

        <?php
                break;
            case 5: //Selesai Tugas

                //Data TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $_petunjuk_member = 'Silakan update status pembayaran terkait order ini. <Br>Silakan isi dengan informasi terkait tugas yang sudah selesai di bagian log aktivitas. <br>
                            Jika sudah selesa tugas, maka pilih tombol "SIMPAN DAN LANJUTKAN STEP".<Br><Br>';
                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member
                ]);

                echo $this->render('_form_selesai_tugas', [
                    'model' => $model,
                ]);

                // untuk menambahkan log kerja 
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    'log_title' => 'Catatan Aktivitas Selesai Tugas'
                ]);
                break;
            case 6: //Tugas Selesai


                //Data TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $_petunjuk_member = 'Penutupan tiket akan dilakukan oleh bagian admin.';
                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member
                ]);


                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                ]);

                break;
            case 7: //Tutup Tiket
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $_petunjuk_member = 'Order telah ditutup dan telah selesai.';
                echo $this->render('order-pegawai-list/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                    //'_petunjuk_admin' => $_petunjuk_admin,
                    '_petunjuk_member' => $_petunjuk_member
                ]);


                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index-plain', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                ]);
  
                break;
        }
        ?>

        <?php //= Html::a('Tambah TKBM', ['update', 'id' => $model->id_order_pegawai], ['class' => 'btn btn-success']) 
        ?>

    </div>
</div>