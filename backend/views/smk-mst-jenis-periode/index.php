<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkMstJenisPeriodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Periode';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-mst-jenis-periode-index">

        
        <p>
            <?= Html::a('Tambah Jenis Periode', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jenis_periode',
            'jumlah',
            'deskripsi',
            'is_used',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
