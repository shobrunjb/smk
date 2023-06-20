<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProEnvironmentAttribute */

//$this->title = $model->id_pro_environment_attribute;
$this->title = 'Detail '.'Environment Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Environment Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body pro-environment-attribute-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_pro_environment_attribute], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pro_environment_attribute], [
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
                'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
