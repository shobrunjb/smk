<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ScrumDailyForNow */

//$this->title = $model->id_scrum_daily_for_now;
$this->title = 'Detail '.'Scrum Daily For Now';
$this->params['breadcrumbs'][] = ['label' => 'Scrum Daily For Now', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body scrum-daily-for-now-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_scrum_daily_for_now], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_scrum_daily_for_now], [
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
                'target',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
