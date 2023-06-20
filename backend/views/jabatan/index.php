<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body jabatan-index">

        
        <p>
            <?= Html::a('Tambah Jabatan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'kode_jabatan',
                'nama_jabatan',
                'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
