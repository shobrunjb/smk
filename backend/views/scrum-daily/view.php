<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDaily */

//$this->title = $model->id_scrum_daily;
$this->title = 'Detail '.'Scrum Daily';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body scrum-daily-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_scrum_daily], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_scrum_daily], [
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
                'standup_date',
            'yesterday_todo',
            'today_todo',
            'obstacle',
            'yesterday_bukti',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
