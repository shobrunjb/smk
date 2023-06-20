<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiklatPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diklat Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body diklat-pegawai-index">


        <p>
            <?php //= Html::a('Tambah Diklat Pegawai', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span> Diklat Pegawai'],
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_diklat',
                'tanggal_diklat',
                'kategori.Kategori',
                'penyelenggara',
                'jumlah_peserta',
                'syarat',
                //'deskripsi',
                [
                    'label' => 'Lihat Order',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_diklat);
                        //if($data->status_order == 'BELUM'){

                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Lihat Diklat',
                            ['diklat-pegawai-member/view-diklat', 'i' => $i],
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