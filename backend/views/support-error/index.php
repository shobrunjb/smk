<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupportErrorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Support Error';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body support-error-index">

        
        <p>
            <?= Html::a('Tambah Support Error', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'judul',
            'deskripsi:ntext',
            'file_pendukung',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
