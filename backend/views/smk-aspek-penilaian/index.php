<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkAspekPenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aspek Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-aspek-penilaian-index">

        
        <p>
            <?= Html::a('Tambah Smk Aspek Penilaian', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'aspek_penilaian',
            'deskripsi',
            'kategori',
            'mode',
            'is_used',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
