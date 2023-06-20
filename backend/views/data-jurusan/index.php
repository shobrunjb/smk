<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataJurusanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jurusan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body data-jurusan-index">

        
        <p>
            <?= Html::a('Tambah Data Jurusan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_jurusan_id',
            'nama_jurusan_en',
            'status',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
