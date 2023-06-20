<?php

use yii\helpers\Html;
use frontend\widgets\CustomFrontDetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PublikUser */


\yii\web\YiiAsset::register($this);
$basepath = Yii::$app->request->baseUrl;
?>

<style>
    table tr th {
        font-weight: 400 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        padding: 10px 15px !important;
        background-color: none;
    }
</style>
<div class="box">
    <div class="box-body publik-user-view">
        <div class="alert alert-info">
            Selamat, registrasi anda telah berhasil. 
            Untuk masuk ke sistem silakan login terlebih dahulu!<Br>
            <a href="<?= yii\helpers\Url::toRoute(['/administrator/site/login']) ?>" class="btn btn-sm btn-success">LOGIN</a>
        </div>

        <?= CustomFrontDetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table front-detail'],
            'attributes' => [
                'nama',
                'jenis_user',
                'nik',
                'pekerjaan',
                'alamat',
                [
                    'attribute' => 'id_kabupaten',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->kabupaten)) {
                            return $data->kabupaten->nama_kabupaten;
                        } else {
                            return "--";
                        }
                    },
                ],
                [
                    'attribute' => 'id_propinsi',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->propinsi)) {
                            return $data->propinsi->nama_propinsi;
                        } else {
                            return "--";
                        }
                    },
                ],
                'nomor_telepon',
                'email:email',
                //'file_identitas',
                //'file_akta_pendirian',
            ],
        ]) ?>

        <?php /*
        <?php 
        $imgpath = $model->file_identitas;
        if ($model->file_identitas != "") {
            echo '<h4>Foto Identitas</h4>';
            echo '<img class="img-responsive img-thumbnail"  width="200px" src="' . $basepath . '/uploads/file_identitas/' . $imgpath . '" alt="Foto"/>';
        } 
        ?>
        <?php 
        $imgpath = $model->file_akta_pendirian;
        if($model->jenis_pemohon == "BADAN PUBLIK"){
            if ($model->file_akta_pendirian != "") {
                echo '<h4>File Akta Pendirian</h4>';
                echo '<a href="' . $basepath . '/uploads/file_akta_pendirian/' . $imgpath . '" class="btn btn-info">Lihat File</a>';
            } 
        }
        ?>
        */ ?>

    </div>
</div>
