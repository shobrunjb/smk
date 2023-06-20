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


/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hitung Score';
$this->params['breadcrumbs'][] = $this->title;

$stemmerFactory = new StemmerFactory();
$stemmer = $stemmerFactory->createStemmer();

?>
<div class="bei-kar-asses-jawaban-index box box-primary">
    <div class="box-header with-border">
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php
    echo  Html::a('Display Dictionary', ['display-word-bag'], ['class' => 'btn btn-sm btn-warning']);
?>
<?php
    echo  Html::a('Display Keyword', ['display-word-key'], ['class' => 'btn btn-sm btn-success']);
?>

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
            'soal',
            'jawaban:ntext',
             [
                'label' => 'Debugging',
                //'attribute' => 'id_pegawai',
                'format' => 'raw',
                'value' => function($data) use ($stemmer) {
                        $sentence2 = 'Perekonomian sedang dalam pertumbuhan yang membanggakan';
                        $sentence2 = $data->jawaban;
                        $output = $stemmer->stem($sentence2);


                        $levels = HrmCompetencyDimensionLevel::find()
                        ->where(['id_hrm_competency_dimension'=>$data->id_hrm_competency_dimension])
                        ->all();
                        foreach($levels as $level){
                            //$output .= $level->description_ind."<br>";
                            $stem2 = $stemmer->stem($level->description_ind);
                            //$output .= $stem2;
                        }


                        return $output;
                    }
            ],
            [
                'label' => 'Debugging',
                //'attribute' => 'id_pegawai',
                'format' => 'raw',
                'value' => function($data) use ($stemmer) {
                        $output = "";


                        $levels = HrmCompetencyDimensionLevel::find()
                        ->where(['id_hrm_competency_dimension'=>$data->id_hrm_competency_dimension])
                        ->all();
                        foreach($levels as $level){
                            //$output .= $level->description_ind."<br>";
                            $stem2 = $stemmer->stem($level->description_ind);
                            $output .= $stem2;
                            //$output .= $level->key_verb;
                            $output .="<br>=====<br>";
                        }


                        return $output;
                    }
            ],
            //'score_by_machine',

            //'score_by_asesor',
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
