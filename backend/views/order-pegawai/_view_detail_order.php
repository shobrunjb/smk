<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'tanggal_order',
                'nomor_order',
                [
                    'attribute' => 'id_order_pegawai_kategori',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->kategori)) {
                            return $data->kategori->kategori;
                        } else {
                            return "--";
                        }
                    },
                    'filter' => false,
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                //'nomor_order_inc',
                //'jumlah',
                //'deskripsi',
                //'total_biaya',
                //'status_pembayaran',
                //'tanggal_pembayaran',
                //'bukti_pembayaran',
                //'created_date',
                //'created_ip_address',
            ],
        ]) ?>


    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'tanggal_order',
                //'nomor_order',
                /*
                [
                    'attribute' => 'id_order_pegawai_kategori',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->kategori)) {
                            return $data->kategori->kategori;
                        } else {
                            return "--";
                        }
                    },
                    'filter' => false,
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                */
                //'nomor_order_inc',
                'jumlah',
                'deskripsi',
                // 'total_biaya',
                // 'progress.order_progress',
                'status_pembayaran',
                //'tanggal_pembayaran',
                //'bukti_pembayaran',
                //'created_date',
                //'created_ip_address',
            ],
        ]) ?>


    </div>
</div>