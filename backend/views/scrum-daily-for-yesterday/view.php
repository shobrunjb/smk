<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForYesterday */

//$this->title = $model->id_scrum_daily_for_yesterday;
$this->title = 'Detail '.'Scrum Daily For Yesterday';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Yesterday', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body scrum-daily-for-yesterday-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_scrum_daily_for_yesterday], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_scrum_daily_for_yesterday], [
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
                'progres',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
