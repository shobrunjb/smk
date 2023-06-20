<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmPerusahaanAsuransi */

//$this->title = $model->id_hrm_perusahaan_asuransi;
$this->title = 'Detail '.'Perusahaan Asuransi';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan Asuransi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-perusahaan-asuransi-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_hrm_perusahaan_asuransi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_perusahaan_asuransi], [
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
                'perusahaan_asuransi',
            'deskripsi',
            'alamat_kontak',
            'telepon_kontak',
            'email_kontak:email',
            'active_status',
            ],
        ]) ?>

    </div>
</div>
