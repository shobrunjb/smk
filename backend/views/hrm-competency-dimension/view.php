<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\HrmCompetencyDimensionLevel;
/* @var $this yii\web\View */
/* @var $model app\models\HrmCompetencyDimension */

$this->title = 'View Jenis Kompetensi : '. $model->competeny_dimension_ind;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Competency Dimensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hrm-competency-dimension-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hrm_competency_dimension], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_competency_dimension], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_hrm_competency_dimension',
            //'id_hrm_competency_cluster',
            //'id_hrm_competency_category',
            //'competeny_dimension_eng',
            'no',
            //'abbr_eng',
            //'description_eng:ntext',
           //'keywords_eng',
            'competeny_dimension_ind',
            'abbr_ind',
            'description_ind:ntext',
            'keywords_ind',
        ],
    ]) ?>
    </div>

    <div class="box box-body">
        <?php /*
         <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_hrm_competency_dimension',
                //'id_hrm_competency_cluster',
                //'id_hrm_competency_category',
                'competeny_dimension_eng',
                //'no',
                'abbr_eng',
                'description_eng:ntext',
                'keywords_eng',
                //'competeny_dimension_ind',
                //'abbr_ind',
                //'description_ind:ntext',
                //'keywords_ind',
            ],
        ]) */ 

         $query = HrmCompetencyDimensionLevel::find()->where(['id_hrm_competency_dimension' => $model->id_hrm_competency_dimension, 'level'=> $model->no])->all();
                foreach ($query as $data) {
                    $test = $data['description_ind'];
                    echo "<b> Deskripsi Level : " .$test."</b>";
    }


        ?>
    </div>

</div>
