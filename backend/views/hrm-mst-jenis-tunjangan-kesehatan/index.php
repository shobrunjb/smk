<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmMstJenisTunjanganKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Tunjangan Kesehatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-mst-jenis-tunjangan-kesehatan-index">

        
        <p>
            <?= Html::a('Tambah Jenis Tunjangan Kesehatan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jenis_tunjangan_kesehatan',
            'is_used',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
