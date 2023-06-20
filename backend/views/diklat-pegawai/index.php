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
            <?= Html::a('Tambah Diklat Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-book"></span> Diklat Pegawai'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_diklat',
                'tanggal_diklat',
                'kategori.Kategori',
                'penyelenggara',
                'jumlah_peserta',
                'syarat',
                'status',
                //'deskripsi',
                [
                    'label' => 'Lihat Order',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt', $data->id_diklat);

                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Lihat Diklat',
                            ['diklat-pegawai/view-diklat', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs']
                        );
                        //}
                    }
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>