<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstEnvironmentAttributeGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Environment Attribute Grade';
$this->params['breadcrumbs'][] = $this->title;

$dataListEnvironmentAttribute = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MstEnvironmentAttribute::find()
         ->orderBy([
            'environment_attribute' => SORT_ASC
            ])
        ->all(), 'id_mst_environment_attribute', 'environment_attribute');
?>

<div class="box">
    <div class="box-body mst-environment-attribute-grade-index">

        
        <p>
            <?= Html::a('Tambah Environment Attribute Grade', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_mst_environment_attribute',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->environmentAttribute)) {
                            return $data->environmentAttribute->environment_attribute;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_mst_environment_attribute', $dataListEnvironmentAttribute, ['class' => 'form-control']),
                ],
                'grade_label',
            'grade_value',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
