<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmkPegawaiTahunan */

//$this->title = $model->id_smk_pegawai_tahunan;
$this->title = 'Detail '.'Smk Pegawai Tahunan';
$this->params['breadcrumbs'][] = ['label' => 'Smk Pegawai Tahunan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body smk-pegawai-tahunan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_smk_pegawai_tahunan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_smk_pegawai_tahunan], [
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
                'type_periode',
            'year',
            'rev_no',
            'plan_is_changed',
            'planchange_is_approved',
            'planchange_notes:ntext',
            'plan_is_approved',
            'plan_approval_date',
            'plan_approval_ip_address',
            'plan_approval_notes:ntext',
            'bimb_is_approved',
            'bimb_approval_date',
            'bimb_approval_ip_address',
            'bimb_approval_notes:ntext',
            'is_approved',
            'approval_date',
            'approval_ip_address',
            'approval_notes:ntext',
            'nilai_point',
            'nilai_angka',
            'keterangan_nilai',
            'bmb_nilai_point',
            'bmb_nilai_angka',
            'bmb_keterangan_nilai',
            'final_nilai_point',
            'final_nilai_angka',
            'final_keterangan_nilai',
            'keterangan',
            'plan_status_completed',
            'bimb_status_completed',
            'final_status_completed',
            'status',
            'filename',
            'created_date',
            'created_user',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
