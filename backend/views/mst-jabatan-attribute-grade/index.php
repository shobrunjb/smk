<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstJabatanAttributeGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jabatan Attribute Grade';
$this->params['breadcrumbs'][] = $this->title;

$dataListJabatanAttribute = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MstJabatanAttribute::find()
         ->orderBy([
            'jabatan_attribute' => SORT_ASC
            ])
        ->all(), 'id_mst_jabatan_attribute', 'jabatan_attribute');
?>
<div class="box">
    <div class="box-body mst-jabatan-attribute-grade-index">

        
        <p>
            <?= Html::a('Tambah Jabatan Attribute Grade', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_mst_jabatan_attribute',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->jabatanAttribute)) {
                            return $data->jabatanAttribute->jabatan_attribute;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_mst_jabatan_attribute', $dataListJabatanAttribute, ['class' => 'form-control']),
                ],
                'grade_label',
                'grade_value',
                'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
