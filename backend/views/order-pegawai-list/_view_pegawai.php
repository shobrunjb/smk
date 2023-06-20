<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiList */

//$this->title = $model->id_order_pegawai_list;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body order-pegawai-list-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_order_pegawai_list',
                //'id_order_pegawai',
                // 'id_pegawai',
                'pegawai.nama_lengkap',
            ],
        ]) ?>

    </div>
</div>