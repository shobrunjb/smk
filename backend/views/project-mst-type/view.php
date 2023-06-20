<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstType */

//$this->title = $model->id_project_mst_type;
$this->title = 'Detail '.'Project Mst Type';
$this->params['breadcrumbs'][] = ['label' => 'Project Mst Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body project-mst-type-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_project_mst_type], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_project_mst_type], [
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
                'project_type',
            'deskripsi:ntext',
            'is_active',
            ],
        ]) ?>

    </div>
</div>
