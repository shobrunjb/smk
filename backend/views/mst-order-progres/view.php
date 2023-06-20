<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\mstOrderProgres */

//$this->title = $model->id_mst_order_progres;
$this->title = 'Detail '.'Mst Order Progres';
$this->params['breadcrumbs'][] = ['label' => 'Mst Order Progres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-order-progres-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_order_progres], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_order_progres], [
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
                'order_progress',
            ],
        ]) ?>

    </div>
</div>
