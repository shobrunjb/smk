<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SprintCeremonySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sprint Ceremony';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sprint-ceremony-index">

        
        <p>
            <?= Html::a('Tambah Sprint Ceremony', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'ceremony',
            'noted:ntext',
            'external_notes1',
            'external_notes2',
            'external_notes3',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
