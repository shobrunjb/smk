<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Pegawai Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body order-pegawai-kategori-index">

        
        <p>
            <?= Html::a('Tambah Order Pegawai Kategori', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'kategori',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
