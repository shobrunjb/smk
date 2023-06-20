<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectMstRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Mst Role';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body project-mst-role-index">

        
        <p>
            <?= Html::a('Tambah Project Mst Role', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'role_name',
            'icon',
            'is_active',
            'description:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
