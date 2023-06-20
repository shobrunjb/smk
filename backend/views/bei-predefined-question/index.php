<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\BeiMstCategoryPredefQuest;
use backend\common\labeling\CommonActionLabelEnum;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiPredefinedQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pertanyaan Kompetensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-predefined-question-index box box-primary">

    <div class="box-header with-border">
        <?= Html::a('Tambah Pertanyaan', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body">

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

           // 'id_bei_predefined_question',
            'question_ind',
            'question_eng',
            'number',
            [
                'attribute' => 'categoryBei.category_predef_quest',
                'label'=>'Kategori Pertanyaan',
                 'filter' => Html::activeDropDownList($searchModel, 'id_bei_mst_category_predef_quest', ArrayHelper::map(BeiMstCategoryPredefQuest::find()->orderBy('id_bei_mst_category_predef_quest')->all(),'id_bei_mst_category_predef_quest','category_predef_quest'),['class'=>'form-control','prompt'=>'-Pilih-']),
            ],
            //'id_bei_mst_category_predef_quest',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
