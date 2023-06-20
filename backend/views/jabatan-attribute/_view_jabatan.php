<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HrmPegawai */

?>
<div class="hrm-pegawai-view box box-primary">
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                /*'id_pegawai',
                'id_perusahaan',
                'userid',
                'cid',
                'no_dossier', */
                'nama_jabatan',
                'kode_jabatan',
                'keterangan',
            ],
        ]) ?>
    </div>
</div>
