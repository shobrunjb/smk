<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstOrganizationAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organization Attribute';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-organization-attribute-index">

        
        <p>
            <?= Html::a('Tambah Organization Attribute', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'organization_attribute',
            'is_active',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
