<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstJabatanAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan Attribute';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-jabatan-attribute-index">

        
        <p>
            <?= Html::a('Tambah Jabatan Attribute', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jabatan_attribute',
            'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
