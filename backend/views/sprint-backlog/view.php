<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SprintBacklog */

//$this->title = $model->id_sprint_backlog;
$this->title = 'Detail '.'Sprint Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Sprint Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sprint-backlog-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sprint_backlog], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sprint_backlog], [
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
                'start_work',
            'end_work',
            'last_contribute_user',
            'total_duration',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
