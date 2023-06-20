<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\HrmCompetencyDimension;
use backend\models\HrmCompetencyDimensionLevel;
use backend\models\BeiCompetencyQuestion;
use backend\models\BeiInterviewSession;
use backend\models\HrmPegawai;
use backend\common\labeling\CommonActionLabelEnum;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\SentenceDetector\SentenceDetectorFactory;
use backend\common\helpers\NlpPredictorHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Predict Score';
$this->params['breadcrumbs'][] = $this->title;

$stemmerFactory = new StemmerFactory();
$stemmer = $stemmerFactory->createStemmer();

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


            //'id_bei_interview_session',
             [
                'label' => 'Nama Pegawai',
                'attribute' => 'id_pegawai',
                'value' => 'pegawai.nama_lengkap',
            ],
            //'id_pegawai',
            //'soal',
            'jawaban:ntext',
             [
                'label' => 'Score',
                //'attribute' => 'id_pegawai',
                'format' => 'raw',
                'value' => function($data) use ($stemmer) {
                        $levels = HrmCompetencyDimensionLevel::find()
                        ->where(['id_hrm_competency_dimension'=>$data->id_hrm_competency_dimension])
                        ->orderBy([
                          'level' => SORT_ASC,
                        ])
                        ->all();

                        $res = '';

                        foreach ($levels as $level){
                            $predictScore = NlpPredictorHelper::predict($data->jawaban, $data->id_hrm_competency_dimension, $level->level);
                            $res .= "Lv".$level->level." : ".$predictScore.'<br>';
                        }
                        return $res;
                    }
            ],

            'score_by_machine',

            'score_by_asesor',
            //'key_verb',
            //'key_time',
            //'key_location',
            //'r_st',
            //'r_ar',
            //'modified_time',
            //'modified_user',
            //'modified_ip_address',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
