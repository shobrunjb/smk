<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmCompetencyDimensionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Kompetensi';
$this->params['breadcrumbs'][] = $this->title;

 /* $js=<<<js
    $('.modalButton').on('click', function () {
        $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
    });
js;
$this->registerJs($js); */

?>
<div class="box box-body hrm-competency-dimension-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <a class="btn btn-success modalButton" value="<?= Url::to(['hrm-competency-dimension/create']) ?>">Tambah Jenis Kompetensi</a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_hrm_competency_dimension',
            //'id_hrm_competency_cluster',
            //'id_hrm_competency_category',
            'no',
            'competeny_dimension_ind',
            'abbr_ind',
            'competeny_dimension_eng',
            
            'abbr_eng',
            //'description_eng:ntext',
            //'keywords_eng',
            
            
            //'description_ind:ntext',
            //'keywords_ind',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
    Modal::begin([
        'header' => '<h3 style="margin:0px;"> Tambah Jenis Kompetensi </h3>',
        'id' => 'modal',
        'size' => 'modal-md',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
?>
