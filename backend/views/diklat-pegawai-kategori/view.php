<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawaiKategori */

//$this->title = $model->id_diklat_pegawai_kategori;
$this->title = 'Detail '.'Diklat Pegawai Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body diklat-pegawai-kategori-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_diklat_pegawai_kategori], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_diklat_pegawai_kategori], [
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
                'Kategori',
            ],
        ]) ?>

    </div>
</div>
