<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\HrmCompetencyDimension;
use backend\models\BeiCompetencyQuestion;
use backend\models\BeiInterviewSession;
use backend\models\HrmPegawai;
use backend\common\labeling\CommonActionLabelEnum;
use kartik\editable\Editable;
use backend\common\utils\EncryptionUtil;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hasil Jawaban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-kar-asses-jawaban-index box box-primary">
    <div class="box-header with-border">
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="box-body table-responsive no-padding">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
            'filterModel' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            //'id_bei_kar_asses_jawaban',
            //'id_kompetensi_dasar',
            //'id_bei_compentecy_question',
                [
                    'label' => 'Kompetensi Dimensi',
                    'attribute' => 'id_hrm_competency_dimension',
                    'value' => 'comDimension.competeny_dimension_ind',
                ],
            //'id_bei_compentecy_question',
                [
                    'label' => 'Kompetensi',
                    'attribute' => 'id_bei_compentecy_question',
                    'value' => function($data){
                        if(isset($data->question->compentecy)){
                            return $data->question->compentecy->competeny_dimension_ind;
                        }else{
                            return "--";
                        }

                    },
                ],

            //'id_bei_interview_session',
                [
                    'label' => 'Nama Pegawai',
                    'attribute' => 'id_pegawai',
                    'value' => 'pegawai.nama_lengkap',
                ],
            //'id_pegawai',
                'soal',
                'jawaban:ntext',
            //'score_by_machine',
            // [
            //     'attribute' => 'score_by_asesor',
            //     'value' => function($model){
            //         return Html::textInput('', $model->score_by_asesor);
            //     },
            //     'format' => 'raw'
            // ],

                [
                   'class' => 'kartik\grid\EditableColumn',
                   'attribute' => 'score_by_asesor',
                   'pageSummary' => true,
                   'readonly' => false,
                   'value' => function($model){ return $model->score_by_asesor; }, // assign value from getProfileCompany method
                   'editableOptions' => [
                    'header' => 'Score',
                    'size' => 'md',
                    'format' => 'button',
                    'placement' => 'left',
                    'inputType' => kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => [

                        ]
                    ]
                ],
            ],  
            //'score_by_asesor',
            //'key_verb',
            //'key_time',
            //'key_location',
            //'r_st',
            //'r_ar',
            //'modified_time',
            //'modified_user',
            //'modified_ip_address',



            ['class' => 'yii\grid\ActionColumn', 
            'template' => '{delete}',
            'buttons'=> [
                'delete' => function ($url, $model) {   
                    return Html::a('<button type="button" class="btn btn-sm btn-default kv-editable-button"><i class="glyphicon glyphicon-trash"></i></button>', ['delete-hasil', 'id' => $model->id_bei_kar_asses_jawaban], [
                        'title' => 'Delete',
                        'data-confirm' => 'Are you sure to delete this item?',
                        'data-method' => 'post',
                    ]);
                }
            ],

        ],
    ],
]); ?>
</div>
</div>
