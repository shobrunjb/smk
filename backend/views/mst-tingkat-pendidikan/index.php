<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstTingkatPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tingkat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-tingkat-pendidikan-index">

        
        <p>
            <?= Html::a('Tambah Tingkat Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tingkat_pendidikan',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
