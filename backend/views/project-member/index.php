<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Member';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body project-member-index">

        
        <p>
            <?= Html::a('Tambah Project Member', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'start_date',
            'end_date',
            'created_date',
            'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
