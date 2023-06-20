<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */

//$this->title = $model->id_project;
$this->title = 'Detail '.'Project';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body project-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_project], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_project], [
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
                'kode_proyek',
            'nama_proyek',
            'description:ntext',
            'is_active',
            'backlog_is_locked',
            'repo_code',
            'repo1',
            'repo2',
            'repo3',
            'repo4',
            'repo5',
            'repo6',
            'plan_start_date',
            'plan_end_date',
            'actual_start_date',
            'actual_end_date',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
