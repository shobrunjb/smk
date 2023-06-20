<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanKinerjaPegawai */

//$this->title = $model->id_laporan_kinerja;
$this->title = 'Detail ' . 'Laporan Kinerja Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kinerja Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body laporan-kinerja-pegawai-view">

        <p>
            <?php //= Html::a('Update', ['update', 'id' => $model->id_laporan_kinerja], ['class' => 'btn btn-primary']) 
            ?>
            <?php //= Html::a('Delete', ['delete', 'id' => $model->id_laporan_kinerja], [
            //     'class' => 'btn btn-danger',
            //     'data' => [
            //         'confirm' => 'Are you sure you want to delete this item?',
            //         'method' => 'post',
            //     ],
            // ]) 
            ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'order.nomor_order',
                'pegawai.nama_lengkap',
                'deskripsi',
            ],
        ]) ?>

    </div>
</div>