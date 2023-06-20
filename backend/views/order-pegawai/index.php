<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body order-pegawai-index">


        <p>
            <?= Html::a('Tambah Order', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php //echo $this->render('_search', ['model' => $searchModel]);
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span><span class="fa fa-pencil"></span> Order Pegawai'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tanggal_order',
                'nomor_order',
                //'nomor_order_inc',
                // 'kategori.kategori',
                'kapal.number2',
                'tongkang.number2',
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
                    // 'filter' => Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                // 'jumlah',
                // 'deskripsi',
                // 'id_order_pegawai',
                'progress.order_progress',
                //'total_biaya',
                //'status_pembayaran',
                //'tanggal_pembayaran',
                //'bukti_pembayaran',
                //'created_date',
                //'created_ip_address',
                [
                    'label' => 'Lihat Order',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_order_pegawai);


                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Lihat Order',
                            ['order-pegawai/view-order', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs']
                        );
                    }
                ],
                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 120px;'],
                    'template' => '{update} || {delete}',
                ],
            ],
        ]); ?>


    </div>
</div>