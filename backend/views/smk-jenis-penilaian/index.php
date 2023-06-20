<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkJenisPenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Smk Jenis Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-jenis-penilaian-index">

        
        <p>
            <?= Html::a('Tambah Smk Jenis Penilaian', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jenis_penilaian',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
