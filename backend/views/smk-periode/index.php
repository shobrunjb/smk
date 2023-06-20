<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkPeriodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periode Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-periode-index">

        
        <p>
            <?= Html::a('Tambah Periode Penilaian', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tahun',
            'periode_no',
            'nama_periode',
            'is_current_periode',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
