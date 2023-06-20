<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\common\labeling\CommonActionLabelEnum;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiMstCategoryPredefQuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Kategori Pertanyaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-mst-category-predef-quest-index box box-primary">

    <div class="box-header with-border">
        <?php // Html::a('Tambah Kategori Pertanyaan', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-cube"></span> Kategori Pertanyaan'],
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

          //  'id_bei_mst_category_predef_quest',
            'category_predef_quest',
            [

            'label'=>'Status',
            'format' => 'boolean',
            'attribute' => 'is_active',
            'filter' => [0=>'No',1=>'Yes'],
            'value' => function($model) {
                return $model->is_active == 1 ? 'Yes' : 'No';

            }
            ],

        //'is_active',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
