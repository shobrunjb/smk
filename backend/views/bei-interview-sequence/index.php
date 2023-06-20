<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiInterviewSequenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bei Interview Sequence';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body bei-interview-sequence-index">

        
        <p>
            <?= Html::a('Tambah Bei Interview Sequence', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'no',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
