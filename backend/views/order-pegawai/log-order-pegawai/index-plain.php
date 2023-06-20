<?php

use backend\models\LogOrderPegawai;
use backend\models\LogOrderPegawaiSearch;
use yii\base\Model;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\logOrderPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Log Order Pegawai';
// $this->params['breadcrumbs'][] = $this->title;
?>

<?php
    if(isset($log_title)){
        $title = $log_title;
    }else{
        $title = "Log Aktivitas Pekerjaan";
    }
?>
<div class="boxs">
    <div class="box-body log-order-pegawai-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-ship"></span> '.$title],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn',
                    'contentOptions' => ['style' => 'vertical-align: top; ', 'class' => 'text-left'],

                ],
                // 'id_mst_order_progress',
                'progress.order_progress',
                'isi_log_order',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>