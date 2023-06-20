<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\HrmCompetencyDimension;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiCompentecyQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pertanyaan Kompetensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-compentecy-question-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <?= Html::a('Tambah Kompetensi', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-cube"></span> Pertanyaan Kompetensi'],
        'export' => [
                'label' => 'Export',
            ],
            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Batch Asesmen',
                    'alertMsg' => 'Export Data to Excel.',
                    'mime' => 'application/vnd.ms-excel',
                    'config' => [
                        'worksheet' => 'ExportWorksheet',
                        'cssFile' => ''
                    ],

                ],
                GridView::CSV => [
                    'label' => 'Save as CSV',
                    'iconOptions' => ['class' => 'text-primary'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Batch Asesmen',
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           /* 'id_bei_compentecy_question',
            [
                'attribute' => 'competency.competeny_dimension_ind',
                'filter' => Html::activeDropDownList($searchModel, 'id_hrm_competency_dimension', ArrayHelper::map(HrmCompetencyDimension::find()->orderBy('id_hrm_competency_dimension')->all(),'id_hrm_competency_dimension','competeny_dimension_ind'),['class'=>'form-control','prompt'=>'-Pilih-']),
            ], 
           */
            [
                'attribute' => 'id_hrm_competency_dimension',
                'value' => function($model) {
                    //return empty($model->compentecy) ? null : $model->competency->competeny_dimension_ind;
                    if(isset($model->competency)){
                        return $model->competency->competeny_dimension_ind;
                    }else{
                        return "--";
                    }
                },
               
                'filter' => ArrayHelper::map(HrmCompetencyDimension::find()->where(['id_hrm_competency_cluster'=>301])->all(), 'id_hrm_competency_dimension', 'competeny_dimension_ind'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width'=>250,
                    ],
                ],
            ],
            'question_ind',
            'question_eng',
            'number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>