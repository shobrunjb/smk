<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LandingHomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Home';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body landing-home-index">

        
        <p>
            <?= Html::a('Tambah Landing Home', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'page_number',
                'page_name',
                //'is_active',
                [
                    'attribute' => 'is_active',
                    'value' => function ($model) {
                        return $model->is_active == 0 ? 'Not Active' : 'Active';
                    },
                ],
                //'source_html:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
