<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKeluarga */

//$this->title = $model->id_keluarga;
$this->title = 'Detail '.'Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-cv-keluarga-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_keluarga], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_keluarga], [
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
            'kategori',
            'nama_lengkap',
            'foto',
            'tempat_lahir',
            'tanggal_lahir',
            'usia',
            'usia_lebih_bulan',
            'jenis_kelamin',
            'status',
            'pekerjaan',
            'tanggal_menikah',
            'tanggal_bercerai',
            'tanggal_meninggal',
            'golongan_darah',
            'agama',
            'status_pernikahan',
            'status_tunjangan',
            'tanggal_tunjangan',
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
