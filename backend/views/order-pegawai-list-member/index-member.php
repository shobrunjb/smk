<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body order-pegawai-list-index">


        <p>
            <?php //= Html::a('Tambah Order Pegawai List', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 

        // $searchModel = $model;
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-ship"></span> Daftar Order'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'id_order_pegawai_list',
                // 'id_order_pegawai',
                // 'id_pegawai',
                // 'pegawai.nama_lengkap',
                'orderPegawai.nomor_order',
                'orderPegawai.tanggal_order',
                'orderPegawai.kategori.kategori',
                'orderPegawai.jumlah',
                'orderPegawai.progress.order_progress',

                [
                    'label' => 'Lihat Order',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_order_pegawai);
                        //if($data->status_order == 'BELUM'){

                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Lihat Order',
                            ['order-pegawai/view-order-member', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs']
                        );
                        //}
                    }
                ],


                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>