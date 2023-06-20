<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewBacthSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batch Interview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-bacth-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <?= Html::a('Tambah Batch Interview', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body table-responsive no-padding">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_bei_interview_batch',
            'nama_batch',
            'jumlah_peserta',
            'keterangan',
            'tanggal_mulai',
            'tanggal_selesai',
            'created_date',
            'created_user',
            //'created_ip_address',
            //'modified_date',
            //'modified_user',
            //'modified_ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>