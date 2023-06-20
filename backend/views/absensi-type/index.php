<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AbsensiTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi Type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body absensi-type-index">

        
        <p>
            <?= Html::a('Tambah Absensi Type', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'absensi_type',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
