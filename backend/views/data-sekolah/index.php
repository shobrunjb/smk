<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataSekolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Sekolah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body data-sekolah-index">

        
        <p>
            <?= Html::a('Tambah Data Sekolah', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'nama_sekolah',
            'nama_sekolah_short',
            'alamat_sekolah',
            'is_valid',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
