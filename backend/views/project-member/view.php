<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMember */

//$this->title = $model->id_project_member;
$this->title = 'Detail '.'Project Member';
$this->params['breadcrumbs'][] = ['label' => 'Project Member', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body project-member-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_project_member], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_project_member], [
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
                'start_date',
            'end_date',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
