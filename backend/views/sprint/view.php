<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprint */

//$this->title = $model->id_sprint;
$this->title = 'Detail '.'Sprint';
$this->params['breadcrumbs'][] = ['label' => 'Sprint', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sprint-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sprint], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sprint], [
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
                'sprint_number',
            'sprint_code',
            'duration_in_week',
            'start_date',
            'end_date',
            'note:ntext',
            'is_active',
            'is_locked',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
