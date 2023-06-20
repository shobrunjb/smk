<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmMstBahasaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bahasa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-mst-bahasa-index box box-primary">

   <div class="box-header with-border">
        <?= Html::a('Tambah Bahasa', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

 <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'',
       // 'showFooter'=>true,
       // 'showHeader' => true,
       // 'showOnEmpty'=>true,
       // 'emptyCell'=>'-',
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_mst_bahasa',
            //'id_perusahaan',
            'bahasa',
            [
            'attribute'=>'is_used',
            'contentOptions' =>['class' => 'table_class','style'=>'width:50px;'],
            'content'=>function($data){
                return $data->is_used;
            }
            ],
            //'is_used',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Action', 
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-edit"></span>', 
                        $url);
                },
                'link' => function ($url,$model,$key) {
                    return Html::a('Action', $url);
                },
            ],
        ],

        ],

       
    ]); ?>
</div>
</div>
