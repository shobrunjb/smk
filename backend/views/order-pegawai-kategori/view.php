<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawaiKategori */

//$this->title = $model->id_order_pegawai_kategori;
$this->title = 'Detail '.'Order Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Order Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body order-pegawai-kategori-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_order_pegawai_kategori], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_order_pegawai_kategori], [
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
                'kategori',
            ],
        ]) ?>

    </div>
</div>
