<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\logOrderPegawai */

//$this->title = $model->id_log_order;
$this->title = 'Detail '.'Log Order Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Log Order Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body log-order-pegawai-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_log_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_log_order], [
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
                'isi_log_order',
            ],
        ]) ?>

    </div>
</div>
