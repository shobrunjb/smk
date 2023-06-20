<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstPersonalAttributeGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Attribute Grade';
$this->params['breadcrumbs'][] = $this->title;
$dataListPersonalAttribute = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MstPersonalAttribute::find()
         ->orderBy([
            'personal_attribute' => SORT_ASC
            ])
        ->all(), 'id_mst_personal_attribute', 'personal_attribute');
?>
<div class="box">
    <div class="box-body mst-personal-attribute-grade-index">

        
        <p>
            <?= Html::a('Tambah Personal Attribute Grade', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_mst_personal_attribute',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->personalAttribute)) {
                            return $data->personalAttribute->personal_attribute;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_mst_personal_attribute', $dataListPersonalAttribute, ['class' => 'form-control']),
                ],
                'grade_label',
                'grade_value',
                'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
