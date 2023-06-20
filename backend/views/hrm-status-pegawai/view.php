<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HrmStatusPegawai */

//$this->title = $model->id_hrm_status_pegawai;
$this->title = 'Detail '.'Hrm Status Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Status Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body hrm-status-pegawai-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_hrm_status_pegawai], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_hrm_status_pegawai], [
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
                'status_pegawai',
            ],
        ]) ?>

    </div>
</div>
