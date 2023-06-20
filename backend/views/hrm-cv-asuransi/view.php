<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmCvAsuransi */

//$this->title = $model->id_cv_asuransi;
$this->title = 'Detail '.'Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-cv-asuransi-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_cv_asuransi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_cv_asuransi], [
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
            'ditanggung_perusahaan',
            'tanggal_mulai_asuransi',
            'tanggal_jatuh_tempo',
            'durasi_asuransi',
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
