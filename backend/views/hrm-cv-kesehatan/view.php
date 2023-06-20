<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvKesehatan */

//$this->title = $model->id_cv_kesehatan;
$this->title = 'Detail '.'Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Kesehatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-cv-kesehatan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_cv_kesehatan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_cv_kesehatan], [
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
            'penyakit_diderita',
            'deskripsi_penyakit',
            'tingkat',
            'lama_sakit',
            'ditanggung_perusahaan',
            'tanggal_penggantian',
            'biaya_ditanggung',
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
