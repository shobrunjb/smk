<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvRiwayatPekerjaan */

//$this->title = $model->id_riwayat_pekerjaan;
$this->title = 'Detail '.'Riwayat Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-cv-riwayat-pekerjaan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_riwayat_pekerjaan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_riwayat_pekerjaan], [
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
                'code_id',
            'nama_perusahaan',
            'jenis_pekerjaan',
            'jabatan_terakhir',
            'tahun_mulai',
            'tahun_selesai',
            'gaji_bruto',
            'keterangan',
            'created_date',
            'created_user',
            'created_ip_address',
            'modified_date',
            'modified_user',
            'modified_ip_address',
            ],
        ]) ?>

    </div>
</div>
