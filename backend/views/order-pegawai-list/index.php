<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\orderPegawaiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Pegawai List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body order-pegawai-list-index">


        <p>
            <?php //= Html::a('Tambah Order Pegawai List', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'id_order_pegawai_list',
                'id_order_pegawai',
                'id_pegawai',
                'pegawai.nama_lengkap',


                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>