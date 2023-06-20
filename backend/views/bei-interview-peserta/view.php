<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewPeserta */

$this->title = $model->id_bei_interview_peserta;
$this->params['breadcrumbs'][] = ['label' => 'bei-interview-pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-interview-peserta-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_interview_peserta], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_interview_peserta], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bei_interview_peserta',
            'id_bei_interview_batch',
            'id_pegawai',
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
