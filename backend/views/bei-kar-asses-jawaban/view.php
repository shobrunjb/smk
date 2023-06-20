<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiKarAssesJawaban */

$this->title = $model->id_bei_kar_asses_jawaban;
$this->params['breadcrumbs'][] = ['label' => 'Bei Kar Asses Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-kar-asses-jawaban-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_kar_asses_jawaban], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_kar_asses_jawaban], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bei_kar_asses_jawaban',
            'id_kompetensi_dasar',
            'id_bei_compentecy_question',
            'id_hrm_competency_dimension',
            'id_bei_interview_session',
            'id_pegawai',
            'soal',
            'jawaban:ntext',
            'score_by_machine',
            'score_by_asesor',
            'key_verb',
            'key_time',
            'key_location',
            'r_st',
            'r_ar',
            'modified_time',
            'modified_user',
            'modified_ip_address',
        ],
    ]) ?>

</div>
