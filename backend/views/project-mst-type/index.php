<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectMstTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Mst Type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body project-mst-type-index">

        
        <p>
            <?= Html::a('Tambah Project Mst Type', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'project_type',
            'deskripsi:ntext',
            'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
