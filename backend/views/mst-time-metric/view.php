<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstTimeMetric */

//$this->title = $model->id_time_metric;
$this->title = 'Detail '.'Mst Time Metric';
$this->params['breadcrumbs'][] = ['label' => 'Mst Time Metric', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-time-metric-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_time_metric], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_time_metric], [
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
                'time_metric_id',
            'time_metric_en',
            'description:ntext',
            ],
        ]) ?>

    </div>
</div>
