<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KabupatenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body kabupaten-index">

        
        <p>
            <?= Html::a('Tambah Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_kabupaten',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
