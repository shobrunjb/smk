<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\common\helpers\IPAddressFunction;
use backend\common\helpers\NlpStringHelper;
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

$this->title = 'Display Word Key';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="bei-kar-asses-jawaban-index box box-primary">
    <div class="box-header with-border">
    </div>
    <table class="kv-grid-table table table-bordered table-striped kv-table-wrap"><thead>
        <tr>
            <th data-col-seq="1">No</th>
            <th data-col-seq="1">Kompetensi</th>
        </tr>
        <?php

        $competencys = HrmCompetencyDimension::find()
            ->where(['id_hrm_competency_cluster'=>301])
            ->orderBy([
              'no' => SORT_ASC,
            ])
            ->all();
        foreach ($competencys as $competency){

            $levels = HrmCompetencyDimensionLevel::find()
            ->where(['id_hrm_competency_dimension'=>$competency->id_hrm_competency_dimension])
            ->orderBy([
              'level' => SORT_ASC,
            ])
            ->all();

            $total = HrmCompetencyDimensionLevel::find()
            ->where(['id_hrm_competency_dimension'=>$competency->id_hrm_competency_dimension])
            ->count();
            $total = $total +1;

            $totalanswers = BeiKarAssesJawaban::find()
            ->where(['id_hrm_competency_dimension'=>$competency->id_hrm_competency_dimension])
            ->andWhere(['and', "id_pegawai>=1641", "id_pegawai<=1650"])
            ->andWhere(['>', 'score_by_asesor', 0])
            ->count();

            echo '<tr class="w0">';
            echo '<td rowspan="'.$total.'">'.$competency->no.'</td>';
            echo '<td rowspan="'.$total.'">'.$competency->competeny_dimension_ind.'</td>';
            echo '<td rowspan="'.$total.'">('.$totalanswers.')</td>';
            echo '</tr>';

            //Display Level
            foreach ($levels as $level){

                //Untuk mendapatkan keywordnya
                 $words = BeiAlgWordList::find()
                ->where([
                    'id_hrm_competency_dimension'=>$competency->id_hrm_competency_dimension,
                    'level'=>$level->level,
                    'pos_tagging' => 'kata-kerja-aktif'
                ])
                 ->orderBy([
                  'frequency' => SORT_DESC,
                ])
                ->all();
                $keyword = '';
                foreach($words as $word){
                    $keyword .= $word->keyword."(".$word->frequency.") , ";
                }

                //$keyword = "Ini keyword";
                //Total Data Pendukung
                $totalanswersperlevel = BeiKarAssesJawaban::find()
                ->where(['id_hrm_competency_dimension'=>$competency->id_hrm_competency_dimension, 'score_by_asesor'=>$level->level])
                ->andWhere(['and', "id_pegawai>=1641", "id_pegawai<=1650"])
                //->andWhere(['and', 'score_by_asesor', 0])
                ->count();

                echo '<tr class="w0">';
                echo '<td>'.$level->level.'</td>';
                echo '<td width="150px">'.$level->description_ind.'</td>';
                echo '<td>'.$totalanswersperlevel.'</td>';
                echo '<td>'.$keyword.'</td>';
                echo '</tr>';
            }
        }

        ?>
    </thead>
    </table>
</div>
</div>
