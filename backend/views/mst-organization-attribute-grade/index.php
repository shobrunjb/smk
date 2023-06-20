<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstOrganizationAttributeGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organization Attribute Grade';
$this->params['breadcrumbs'][] = $this->title;
$dataListOrganizationAttribute = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MstOrganizationAttribute::find()
         ->orderBy([
            'organization_attribute' => SORT_ASC
            ])
        ->all(), 'id_mst_organization_attribute', 'organization_attribute');
?>

<div class="box">
    <div class="box-body mst-organization-attribute-grade-index">

        <p>
            <?= Html::a('Tambah Organization Attribute Grade', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_mst_organization_attribute',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->organizationAttribute)) {
                        return $data->organizationAttribute->organization_attribute;
                    } else {
                        return "--";
                    }
                },
                'filter'=>Html::activeDropDownList($searchModel, 'id_mst_organization_attribute', $dataListOrganizationAttribute, ['class' => 'form-control']),
            ],
            'grade_label',
            'grade_value',
            'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
