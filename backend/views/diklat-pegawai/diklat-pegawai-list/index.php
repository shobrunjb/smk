<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\DiklatPegawaiList;
use backend\models\DiklatPegawaiListSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiklatPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Diklat Pegawai List';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body diklat-pegawai-list-index">


        <?php
        // $id_diklat = \common\utils\EncryptionDB::encryptor('decrypt', $i);;
        $model = new DiklatPegawaiList();
        $model->id_diklat = $model_diklat->id_diklat;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo '<div class="alert alert-success">Tambah Peserta berhasil!</div>';
            if (($modelPegawai = \backend\models\HrmPegawai::findOne($model->id_pegawai)) !== null) {
                $modelPegawai->id_hrm_status_pegawai = 4;
                $modelPegawai->save(false);
            }
        }
        ?>
        <div class="row">
            <?php if ($model_diklat->status != 'selesai') {
            ?>
                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div style="margin-left : 10px; margin-right : 10px" class="box-tools pull-left">
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#modal-form-data">
                            <span class="fa fa-plus"></span> Tambah Pegawai
                        </button>
                    </div>
                </div>

                <div style="margin-left : 10px; margin-right : 10px" class="col">
                    <div class="box-tools pull-left">
                        <?php $id = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_diklat); ?>
                        <?= Html::a('Pelatihan Selesai', ['diklat-pegawai/selesai-diklat', 'i' => $id], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>


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
                <hr>







                <?php // echo $this->render('_search', ['model' => $searchModel]); 
                ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span><span class="fa fa-pencil"></span> Daftar Peserta'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id_peserta',
                        // 'id_diklat',
                        'pegawai.nama_lengkap',
                        [
                            'label' => 'Action',
                            'format' => 'raw',
                            //'value' => function ($data) use ($ip) {
                            'value' => function ($data) {
                                $i = $data->id_peserta;
                                //if($data->status_order == 'BELUM'){

                                return Html::a(
                                    '<i class="fa fa-fw fa-trash"></i> Delete',
                                    ['diklat-pegawai/delete-pegawai', 'id' => $i],
                                    ['class' => 'btn btn-danger btn-xs']
                                );
                                //}
                            }
                        ],
                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            <?php } else {
            ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span><span class="fa fa-pencil"></span> Daftar Peserta'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id_peserta',
                        // 'id_diklat',
                        'pegawai.nama_lengkap',
                        // [
                        //     'label' => 'Action',
                        //     'format' => 'raw',
                        //     //'value' => function ($data) use ($ip) {
                        //     'value' => function ($data) {
                        //         $i = $data->id_peserta;
                        //         //if($data->status_order == 'BELUM'){

                        //         return Html::a(
                        //             '<i class="fa fa-fw fa-trash"></i> Delete',
                        //             ['diklat-pegawai/delete-pegawai', 'id' => $i],
                        //             ['class' => 'btn btn-danger btn-xs']
                        //         );
                        //         //}
                        //     }
                        // ],
                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>


            <?php
            } ?>


        </div>
    </div>