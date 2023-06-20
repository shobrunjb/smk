<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkAspekRentangNilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Smk Aspek Rentang Nilai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-aspek-rentang-nilai-index">

        
        <p>
            <?= Html::a('Tambah Smk Aspek Rentang Nilai', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_rentang_nilai',
            'predikat',
            'predikat_nilai',
            'is_has_rentang',
            'batas_bawah',
            //'batas_atas',
            //'label',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
