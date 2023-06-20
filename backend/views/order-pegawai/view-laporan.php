<?php

use backend\models\LogOrderPegawaiSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\OrderPegawaiList;
use backend\models\OrderPegawaiListSearch;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\orderPegawai */

//$this->title = $model->id_order_pegawai;
$this->title = 'Laporan Kinerja Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kinerja Pegawai', 'url' => ['view-laporan', 'i'=>$i]];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body order-pegawai-view">


        <?php

        echo $this->render('/order-pegawai/_view_detail_order', [
            'model' => $model,
        ]);
        ?>
        <?php
        $searchModel = new OrderPegawaiListSearch();
        $searchModel->id_order_pegawai = $model->id_order_pegawai; //Difilter hanya yang sesuai order saja
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        echo $this->render('order-pegawai-list/index-laporan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_order' => $model,
            'i' => $i,
        ]);

        // echo $this->render('/order-pegawai-list/index-laporan', [
        //     'model' => $model,
        // ]);
        ?>

        <?php
        //Di bagian sini nanti ditampilkan atau dirender berdasarkan status mst_order_progres
        //echo $model->id_mst_order_progres;

        ?>

        <?php //= Html::a('Tambah TKBM', ['update', 'id' => $model->id_order_pegawai], ['class' => 'btn btn-success']) 
        ?>

    </div>
</div>