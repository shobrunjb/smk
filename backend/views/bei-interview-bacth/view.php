<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiInterviewBacth */

$this->title = $model->id_bei_interview_batch;
$this->params['breadcrumbs'][] = ['label' => 'bei-interview-bacths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-interview-bacth-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_interview_batch], ['class' => 'btn btn-primary btn-flat']) ?>
       
    </div>

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_bei_interview_batch',
            'nama_batch',
            'jumlah_peserta',
            'keterangan',
            'tanggal_mulai',
            'tanggal_selesai',
            'created_date',
            'created_user',
            'created_ip_address',
            /*'modified_date',
            'modified_user',
            'modified_ip_address',*/
        ],
    ]) ?>

</div>
</div>
