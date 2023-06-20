<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\DiklatPegawaiList;
use backend\models\DiklatPegawaiListSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\DiklatPegawai */

//$this->title = $model->id_diklat;
$this->title = 'Detail '.'Diklat Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Diklat Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body diklat-pegawai-view">

                <p>
            <?php //= Html::a('Update', ['update', 'id' => $model->id_diklat], ['class' => 'btn btn-primary']) ?>
            <?php //= Html::a('Delete', ['delete', 'id' => $model->id_diklat], [
                // 'class' => 'btn btn-danger',
                // 'data' => [
                //     'confirm' => 'Are you sure you want to delete this item?',
                //     'method' => 'post',
                // ],
            // ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama_diklat',
            'tanggal_diklat',
            'penyelenggara',
            'jumlah_peserta',
            'syarat',
            'deskripsi',
            ],
        ]) ?>
        <?php 
        $searchModel = new DiklatPegawaiListSearch();
        $searchModel->id_diklat = $model->id_diklat; //Difilter hanya yang sesuai order saja
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        echo $this->render('diklat-pegawai-list/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_diklat' => $model,
            // 'i' => $i,
        ]);
        ?>

    </div>
</div>
