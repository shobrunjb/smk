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
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai', 'url' => ['index']];
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
            case 1: //BARU (Validasi)
                echo $this->render('_form_validasi', [
                    'model' => $model,
                ]);
                
                // untuk menambahkan log kerja 
                /*
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                ]);
                */
                break;

            case 2: //Pilih TKBM
                $searchModel = new OrderPegawaiListSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('order-pegawai-list/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                ]);
                // untuk menambahkan log kerja 
                /*
                $searchModel = new LogOrderPegawaiSearch();
                $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                echo $this->render('log-order-pegawai/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_order' => $model,
                    'i' => $i,
                ]);
                */
        ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">
                        <?= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-order-list-pegawai', 'i' => $i], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div><?php
                        break;
                    case 3: //Persiapan
                        $searchModel = new OrderPegawaiListSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $_petunjuk_admin = 'Bagian ini diisi oleh pegawai. Pastikan bahwa pegawai atau ketua tim telah mengisi dengan baik<br>
                            Untuk melihat catatan aktivitas persiapan dapat dilihat pada bagian list aktivitas persiapan.<br><Br>
                            Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.';


                        echo $this->render('order-pegawai-list/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            '_petunjuk_admin' => $_petunjuk_admin,
                            //'_petunjuk_member' => $_petunjuk_member
                        ]);
                        // log order
                        
                        $searchModel = new LogOrderPegawaiSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        echo $this->render('log-order-pegawai/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            'log_title' => 'Catatan Aktivitas Persiapan'
                        ]);
                        
                        ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">

                        <?php //= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-pilih-tkbm', 'i' => $i], ['class' => 'btn btn-primary']) 
                        ?>
                    </div>
                </div>

            <?php
                        break;
                    case 4: //Mulai Tugas
                        $searchModel = new OrderPegawaiListSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        
                        $_petunjuk_admin = 'Bagian ini diisi oleh pegawai. Pastikan bahwa pegawai atau ketua tim telah mengisi bagian dengan baik.<br>
                            Untuk melihat catatan aktivitas mulai tugas dapat dilihat pada bagian list aktivitas mulai tugas.<br><Br>
                            Untuk melihat list pegawai yang bertugas silakan expand di bagian kotak list pegawai bertugas.';
                        echo $this->render('order-pegawai-list/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            '_petunjuk_admin' => $_petunjuk_admin,
                            //'_petunjuk_member' => $_petunjuk_member
                        ]);
                        // log order
                        $searchModel = new LogOrderPegawaiSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        echo $this->render('log-order-pegawai/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            'log_title' => 'Catatan Aktivitas Mulai Tugas'
                        ]);
            ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">

                        <?php //= Html::a('Simpan & Lanjutkan Step Selanjutnya', ['save-persiapan', 'i' => $i], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            <?php
                        break;
                    case 5: //Mulai Tugas

                        //Data TKBM
                        $searchModel = new OrderPegawaiListSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        $_petunjuk_admin = 'Bagian ini diisi oleh pegawai. Pastikan bahwa pegawai atau ketua tim telah mengisi bagian dengan baik.<br>
                            Pastikan pegawai telah melakukan update status pembayarannya.';

                        echo $this->render('order-pegawai-list/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            '_petunjuk_admin' => $_petunjuk_admin,
                            //'_petunjuk_member' => $_petunjuk_member
                        ]);

                        echo $this->render('_view_selesai_tugas', [
                            'model' => $model,
                        ]);

                        /*
                        echo $this->render('_form_selesai_tugas', [
                            'model' => $model,
                        ]);
                        */
                        // untuk menambahkan log kerja 
                        $searchModel = new LogOrderPegawaiSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $searchModel->id_mst_order_progress = $model->id_mst_order_progres;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        echo $this->render('log-order-pegawai/index-plain', [
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

                        $_petunjuk_admin = 'Silakan tutup tiket jika order sudah selesai.<br>
                            Order wajib ditutup agar pegawai dapat dimasukkan kembali ke order selanjutnya.';

                        //echo $this->render('order-pegawai-list/index-finish', [
                        echo $this->render('order-pegawai-list/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                            '_petunjuk_admin' => $_petunjuk_admin,
                            //'_petunjuk_member' => $_petunjuk_member
                        ]);

                        echo $this->render('_view_selesai_tugas', [
                            'model' => $model,
                        ]);

                        // data log kerja
                        $searchModel = new LogOrderPegawaiSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        echo $this->render('log-order-pegawai/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            'i' => $i,
                        ]);
            ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">

                        <?= Html::a('Tutup Tiket', ['tutup-tiket', 'i' => $i], ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
        <?php

                        break;
                    case 7: //Tutup Tiket
                        $searchModel = new OrderPegawaiListSearch();
                        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        $_petunjuk_admin = 'Order telah ditutup dan telah selesai.';
                        echo $this->render('order-pegawai-list/index-plain', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model_order' => $model,
                            '_petunjuk_admin' => $_petunjuk_admin,
                            //'_petunjuk_member' => $_petunjuk_member
                        ]);
                        // data log kerja
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