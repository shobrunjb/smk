<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductBacklog */

//$this->title = $model->id_product_backlog;
$this->title = 'Detail '.'Product Backlog';
$this->params['breadcrumbs'][] = ['label' => 'Product Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body product-backlog-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_product_backlog], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_product_backlog], [
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
                'order_number',
                'product_backlog',
                'description:ntext',
                'external_information',
                'priority',
                'load_estimatation',
                'progres_by_team',
                'progres_by_owner',
                'created_date',
                'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
