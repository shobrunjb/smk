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
use backend\models\BeiKarAssesJawaban;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Finish Result';
$this->params['breadcrumbs'][] = $this->title;

$stemmerFactory = new StemmerFactory();
$stemmer = $stemmerFactory->createStemmer();

?>
<div class="bei-kar-asses-jawaban-index box box-primary">
    <div class="box-header with-border">
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div class="box-body table-responsive no-padding">
    <table class="kv-grid-table table table-bordered table-striped kv-table-wrap"><thead>
        <tr>
            <th data-col-seq="1">No</th>
            <th data-col-seq="1">Pegawai</th>
            <th data-col-seq="1">Jawaban</th>
           
            <th data-col-seq="1">Level Value</th>
            <th data-col-seq="1">Asessor</th>
            <th data-col-seq="1">Machine</th>
            <th data-col-seq="1">Selisih</th>
        </tr>
    <?php
    $answers = BeiKarAssesJawaban::find()
    //->where(['id_hrm_competency_dimension'=>$data->id_hrm_competency_dimension])
    //->where(['and', "id_pegawai>=1641", "id_pegawai<=1650"])
    ->where(['>', 'score_by_asesor', 0])
     ->orderBy([
                  'id_pegawai' => SORT_ASC,
                  'id_hrm_competency_dimension' => SORT_ASC,
                ])
    ->all();

    $no=0;
    $strict_accurate = 0;
    $accurate = 0;
    $over_judgment = 0;
    $under_judgment = 0;
    $no_matching = 0;
    $total_can_predict = 0;
    foreach($answers as $answer){
        $no++;

        $selisih = 0;
        if($answer->score_by_machine > 0){
            $selisih = $answer->score_by_machine - $answer->score_by_asesor;
            $total_can_predict++;
            $abs_selisih = abs($selisih);
            if($abs_selisih < 2){
                $accurate++;
            }
            if($abs_selisih == 0){
                $strict_accurate++;
            }
            if($selisih >= 2){
                $over_judgment++;
            }
            if($selisih <= -2){
                $under_judgment++;
            }
        }else{
            $selisih = "-";
            $no_matching++;
        }

        echo '<tr class="w0">';
        echo '<td>'.$no.'</td>';
        echo '<td>'.$answer->id_pegawai.'</td>';
        echo '<td width="400px">'.$answer->jawaban.'</td>';
        echo '<td>'.$answer->level_desc.'</td>';
        echo '<td>'.$answer->score_by_asesor.'</td>';
        echo '<td>'.$answer->score_by_machine.'</td>';
        echo '<td>'.$selisih.'</td>';
        echo '</tr>';

    }
    $TOTAL_RECORD = $no;

    ?>
    </table>

    <?php
        $accurate_percent = (round(($accurate/$total_can_predict)*100,0));
        $strict_accurate_percent = (round(($strict_accurate/$total_can_predict)*100,0));
        $over_percent = (round(($over_judgment/$total_can_predict)*100,0));
        $under_percent = (round(($under_judgment/$total_can_predict)*100,0));
        echo "ACCURATE : ".$accurate." of ".$total_can_predict." * ".$accurate_percent."%<br>";
        echo "STRICT ACCURATE : ".$strict_accurate." of ".$total_can_predict." * ".$strict_accurate_percent."%<br>";
        echo "OVER : ".$over_judgment." of ".$total_can_predict." * ".$over_percent."%<br>";
        echo "UNDER : ".$under_judgment." of ".$total_can_predict." * ".$under_percent."%<br>";

        $can_predict_percentage = (round(($total_can_predict/$TOTAL_RECORD)*100,0));
        echo "Coverage : ".$can_predict_percentage."%";
    ?>
</div>
</div>
