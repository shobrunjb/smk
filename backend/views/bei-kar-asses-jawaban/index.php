<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiKarAssesJawabanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bei Kar Asses Jawabans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-kar-asses-jawaban-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bei Kar Asses Jawaban', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bei_kar_asses_jawaban',
            'id_kompetensi_dasar',
            'id_bei_compentecy_question',
            'id_hrm_competency_dimension',
            'id_bei_interview_session',
            //'id_pegawai',
            //'soal',
            //'jawaban:ntext',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
