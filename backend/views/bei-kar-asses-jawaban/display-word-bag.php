<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\common\helpers\IPAddressFunction;
use backend\common\helpers\NlpStringHelper;
use backend\common\helpers\PostTaggingHelper;
use backend\models\HrmCompetencyDimension;
use backend\models\HrmCompetencyDimensionLevel;
use backend\models\BeiCompetencyQuestion;
use backend\models\BeiInterviewSession;
use backend\models\BeiKarAssesJawaban;
use backend\common\labeling\CommonActionLabelEnum;
use backend\models\BeiAlgWordList;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\SentenceDetector\SentenceDetectorFactory;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Display Word Bag';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="bei-kar-asses-jawaban-index box box-primary">
    <div class="box-header with-border">
    </div>

    <?php
    //Clear Datanya dulu

    $answers = BeiKarAssesJawaban::find()
        //->where(['id_hrm_competency_dimension'=>$data->id_hrm_competency_dimension])
        ->where(['and', "id_pegawai>=1641", "id_pegawai<=1650"])
        ->andWhere(['>', 'score_by_asesor', 0])
        ->all();

    $stemmerFactory = new StemmerFactory();
    $stemmer = $stemmerFactory->createStemmer();
    foreach($answers as $answer){
        //Pre-condisi
        //Membuat jadi huruf kecil
        $sentence = strtolower($answer->jawaban);

        //Clear String
        $sentence = NlpStringHelper::removeUnnecessaryWord($sentence);


        //Stemming (ambil kata dasar) dari jawaban
        //$stem = $stemmer->stem($sentence);
        $stem = $sentence;

        //Dsplay Data Hasil 
        echo $answer->id_pegawai.' '.$answer->score_by_asesor.' ';
        //echo "***".$answer->jawaban."***<br>";
        $stems = explode(" ",$stem);
        foreach($stems as $st){
            
            $type = PostTaggingHelper::postTagging($st);
            echo $st." (".$type.") ";
            /*
            $word = BeiAlgWordList::find()
            ->where([
                'id_hrm_competency_dimension'=>$answer->id_hrm_competency_dimension,
                'level'=>$answer->score_by_asesor,
                'keyword'=>$st,
            ])
            ->one();
            if($word == null){
                $word = new BeiAlgWordList();
                $word->id_hrm_competency_dimension = $answer->id_hrm_competency_dimension;
                $word->level = $answer->score_by_asesor;
                $word->keyword = $st;
                $word->frequency = 1;
                $word->save(false);
            }else{
                $word->frequency = $word->frequency+1;
                $word->save(false);
            }
            */
        }
        echo "<br>";


    }

    ?>

</div>
</div>
