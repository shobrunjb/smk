<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewSession */

$this->title = 'Update Sesi Interview '.$model->id_bei_interview_session;
$this->params['breadcrumbs'][] = ['label' => 'Sesi Interview', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-interview-session-view  box box-primary">

  <!-- <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_interview_session], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_interview_session], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div> -->

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bei_interview_session',
            'id_pegawai',
            'session_date',
            'last_position',
            'last_question:ntext',
            'last_hit',
            'actual_start',
            'actual_end',
            'durasi',
            'status',
            'last_submit',
            'stat_total_number_question',
            'created_date',
            'created_user',
            'created_ip_address',
            'modified_date',
            'modified_user',
            'modified_ip_address',
        ],
    ]) ?>

</div>
</div>
