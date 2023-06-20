<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\logOrderPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Order Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body log-order-pegawai-index">

        
        <p>
            <?= Html::a('Tambah Log Order Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'isi_log_order',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
