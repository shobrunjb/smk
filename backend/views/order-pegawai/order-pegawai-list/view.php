<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiList */

//$this->title = $model->id_order_pegawai_list;
$this->title = 'Detail ' . 'Order Pegawai List';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body order-pegawai-list-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_order_pegawai_list], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_order_pegawai_list], [
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
                'id_order_pegawai_list',
                'id_order_pegawai',
                // 'id_pegawai',
                'pegawai.nama_lengkap',
            ],
        ]) ?>

    </div>
</div>