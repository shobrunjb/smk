<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectMstRole */

//$this->title = $model->id_project_mst_role;
$this->title = 'Detail '.'Project Mst Role';
$this->params['breadcrumbs'][] = ['label' => 'Project Mst Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body project-mst-role-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_project_mst_role], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_project_mst_role], [
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
                'role_name',
            'icon',
            'is_active',
            'description:ntext',
            ],
        ]) ?>

    </div>
</div>
