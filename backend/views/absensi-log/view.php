<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AbsensiLog */

//$this->title = $model->id_absensi_log;
$this->title = 'Detail '.'Absensi Log';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body absensi-log-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_absensi_log], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_absensi_log], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                 [
                    'attribute' => 'id_pegawai',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->pegawai)) {
                            return $data->pegawai->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },
                ],
                'tanggal_absensi',
                'waktu_absensi',
                'latitude',
                'longitude',
                'foto_bukti',
            ],
        ]) ?>

    </div>
</div>
