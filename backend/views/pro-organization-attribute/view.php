<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProOrganizationAttribute */

//$this->title = $model->id_pro_organization_attribute;
$this->title = 'Detail '.'Organization Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Organization Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body pro-organization-attribute-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_pro_organization_attribute], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pro_organization_attribute], [
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
