<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterVehicle */

//$this->title = $model->id_asset_master;
$this->title = 'Detail '.'Asset Master Vehicle';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Vehicle', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-master-vehicle-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_master], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_master], [
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
                'asset_name',
            'asset_code',
            'attribute1',
            'attribute2',
            'attribute3',
            'attribute4',
            'attribute5',
            'deskripsi',
            'status',
            'number_series',
            'date',
            ],
        ]) ?>

    </div>
</div>
